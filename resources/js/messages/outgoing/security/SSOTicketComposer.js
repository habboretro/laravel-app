import OutgoingMessage from '../OutgoingMessage'

export default class extends OutgoingMessage {
  constructor (ticket) {
    super('sso', { ticket })
  }
}
