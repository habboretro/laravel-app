import UserDataComposer from '@/messages/incoming/user/UserDataComposer'

export default class {
  constructor (client) {
    this.client = client
    this.events = new Map
    this.registerEvents()
  }

  registerEvents() {
    this.events.set('UserDataComposer', new UserDataComposer(this.client))
  }

  handleMessage(message) {
    const event = this.events.get(message.data.header_class)
    if (!event) return
    console.log(event)
    // if (!message.header === 'server-event') return this.client.logger.logError(`Unhandled Message ${message.header}`)
    // this.client.logger.logError(`Unhandled Message ${message.header}`)
    // console.log(message)
  }
}
