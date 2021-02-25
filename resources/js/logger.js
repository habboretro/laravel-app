export default class {
  constructor (debug = false) {
    this.debug = debug
  }

  log (message) {
    if (!this.debug) return
    console.log(`[SOCKET] - ${message}`)
  }

  logDump(data, message = null) {
    if (!this.debug) return
    if (message) return console.log(`[SOCKET] - ${message}`, data)
    console.table(data)
  }

  logError (err) {
    if (!this.debug) return
    console.error(`[SOCKET] - ${err}`)
  }
}
