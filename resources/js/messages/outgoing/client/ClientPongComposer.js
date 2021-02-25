import OutgoingMessage from '../OutgoingMessage'

export default class extends OutgoingMessage {
  constructor(message = '') {
    super('pong', { message })
  }
}
