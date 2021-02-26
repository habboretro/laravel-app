<template>
  <section class="w-screen h-screen">
    <jet-game-header v-if="connected" :song="song" :radio-visible="radioVisible" :radio-playing="radioPlaying" :radio-volume="radioVolume" @toggleRadio="toggleRadio" @toggleMusic="toggleMusic" @toggleVolume="volume => toggleVolume(volume)" />
    <div id="flash-container" class="absolute top-0 left-0 right-0 bottom-0 w-screen h-screen pointer-events-auto" style="background: linear-gradient(180deg, rgba(12,90,127,1) 0%, rgba(13,59,101,1) 100%);" />
  </section>
</template>

<script>
import JetGameHeader from '@/components/GameHeader'
import SocketHandler from '@/mixins/SocketHandler'
import RadioHandler from '@/mixins/RadioHandler'

export default {
  mixins: [ SocketHandler, RadioHandler ],
  components: { JetGameHeader },
  props: {
    habbo_swf: String,
    variables: Object,
    params: Object
  },
  mounted() {
    this.initialiseClient()
  },
  metaInfo () {
    return {
      title: `${this.$page.sitename} - Client`,
    }
  },
  methods: {
    initialiseClient() {
      swfobject.embedSWF(
        this.habbo_swf,
        "flash-container",
        "100%",
        "100%",
        "11.1.0",
        "/js/expressInstall.swf",
        this.variables,
        this.params,
        null,
        null
      )
    }
  }
};
</script>
