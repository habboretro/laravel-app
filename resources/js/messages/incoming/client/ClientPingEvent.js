import ClientPongComposer from '../../outgoing/client/ClientPongComposer'
import IncomingMessage from '../IncomingMessage'

export default class extends IncomingMessage {
  handle () {
    this.socket.sendMessage(new ClientPongComposer)
  }
}
