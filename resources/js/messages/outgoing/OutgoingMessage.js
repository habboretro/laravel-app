export default class {
  constructor (header, data) {
    this.header = header
    this.data = data
  }

  getHeader() {
    return this.header
  }

  getMessage() {
    return this.data
  }
}
