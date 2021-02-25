import Logger from '@/logger'
import MessageHandler from '@/messages'
import SSOTicketComposer from '@/messages/outgoing/security/SSOTicketComposer'

export default {
  data () {
    return {
      debug: true,
      logger: null,
      sso: null,
      socket: null,
      messageHandler: null,
      connected: false,
    }
  },
  mounted () {
    this.logger = new Logger(this.debug)
    this.sso = this.$page.me.data.auth_ticket
    this.messageHandler = new MessageHandler(this)
  },
  methods: {
    createConnection () {
      if (!this.sso) return this.logger.logError('You cannot connect to the socket without a valid sso ticket.')
      this.logger.log('Connecting to the socket.')
      this.socket = new WebSocket(`ws://127.0.0.1:2097?token=${this.sso}`)
      this.socket.addEventListener('open', this.onOpen);
      this.socket.addEventListener('message', this.onMessage);
      this.socket.addEventListener('close', this.onClose);
    },
    onOpen () {
      if (!this.socket) return this.logger.logError('The socket connection could not be established.')
      this.logger.log('Connected to the socket.')
      this.connected = true
      this.sendMessage(new SSOTicketComposer(this.sso))
    },
    onClose () {
      if (!this.socket) return this.logger.logError('The socket connection could not be established.')
      this.socket.close()
      this.socket = null
      this.connected = false
      setTimeout(() => this.createConnection(), 5000)
    },
    onMessage(event) {
      const message = (typeof event === 'string' || event instanceof String) ? JSON.parse(event.replace(/&#47;/g, "/")) : JSON.parse(event.data)
      if (!this.messageHandler) return this.logger.logError('The message handler was not initialised.')
      this.messageHandler.handleMessage(message)
    },
    sendMessage(message) {
      if (!this.socket) return this.logger.logError('The socket connection could not be established.')
      if (this.socket.readyState !== WebSocket.OPEN) return this.logger.logError('The socket connection has not finished connecting.')
      this.socket.send(JSON.stringify(message))
    },
  },
}
