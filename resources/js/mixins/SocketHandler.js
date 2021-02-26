export default {
  data () {
    return {
      connected: false,
    }
  },
  mounted () {
    if (typeof window.FlashExternalnterface === 'undefined') window.FlashExternalInterface = {}
    window.FlashExternalInterface.legacyTrack = (type, value, option) => this.onLegacyTrack(type, value, option)
    window.FlashExternalInterface.track = (type, value, option) => this.onTrack(type, value, option)
  },
  methods: {
    onLegacyTrack(type, value, option) {
      if (type === 'authentication' && value === 'authok') this.connected = true
    },
    onTrack(type, value, option) {},
  }
}
