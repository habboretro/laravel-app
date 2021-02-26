export default {
  data () {
    return {
      songInterval: null,
      radioVisible: true,
      radioPlaying: false,
      radioPlayer: null,
      radioVolume: 30,
      song: {
        artist: '',
        track: '',
        cover: '',
        playedAt: '',
        playedBy: '',
      },
    }
  },
  watch: {
    connected (connected) {
      if (connected) {
        this.radioPlayer = new Audio('https://live.repeat.pw')
        this.radioVolume = localStorage.getItem('client.radio-volume') ? localStorage.getItem('client.radio-volume') : 30
        this.radioPlaying = localStorage.getItem('client.radio-playing') ? localStorage.getItem('client.radio-playing') === 'true' : true
        this.radioVisible = localStorage.getItem('client.radio-visible') ? localStorage.getItem('client.radio-visible') === 'true' : false
        this.songInterval = setInterval(() => this.fetchCurrentSong(), 5000)
      }
    },
    radioPlaying(playing) {
      if (!this.radioPlayer) return
      if (playing) this.radioPlayer.play()
      if (!playing) this.radioPlayer.pause()
    },
    radioVolume(radioVolume) {
      if (!this.radioPlayer) return
      this.radioPlayer.volume = parseFloat(radioVolume / 100)
    },
  },
  methods: {
    async fetchCurrentSong () {
      if (!this.connected) return
      const { data: { song } } = await this.$axios.get('https://staff.repeatradio.net/_api/songHistory?limit=1')
      if (typeof song[0] !== 'undefined') this.song = song[0]
    },
    toggleVolume (radioVolume) {
      this.radioVolume = radioVolume
      localStorage.setItem('client.radio-volume', this.radioVolume)
    },
    toggleMusic () {
      this.radioPlaying = !this.radioPlaying
      localStorage.setItem('client.radio-playing', this.radioPlaying)
    },
    toggleRadio () {
      this.radioVisible = !this.radioVisible
      localStorage.setItem('client.radio-visible', this.radioVisible)
    },
  },
}
