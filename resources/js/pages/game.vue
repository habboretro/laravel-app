<template>
  <section class="w-screen h-screen">
    <jet-game-header
      v-if="connected"
      :memberships="memberships"
      :currencies="currencies"
      @helperTool="handleHelperTool"
      @talentTracker="handleTalentTracker"
      @achievements="handleAchievements"
      @myProfile="handleMyProfile"
      @myRooms="handleMyRooms"
      @mysertBox="handleMysertBox"
      @forum="handleForum" />

    <div
      id="flash-container"
      class="absolute top-0 left-0 right-0 bottom-0 w-screen h-screen pointer-events-auto"
      style="background: linear-gradient(180deg, rgba(12,90,127,1) 0%, rgba(13,59,101,1) 100%);" />

    <jet-game-footer
      v-if="connected"
      @hotelView="handleHotelView"
      @friends="handleFriends"
      @chat="handleChat"
      @inventory="handleInventory"
      @avatarEditor="handleAvatarEditor"
      @camera="handleCamera"
      @catalog="handleCatalog"
      @navigator="handleNavigator"
      @fullscreen="handleFullscreen"
      @information="handleInformation"
      @logout="handleLogout" />
  </section>
</template>

<script>
import moment from 'moment'
import JetGameHeader from '@/components/GameHeader'
import JetGameFooter from '@/components/GameFooter'
import SocketHandler from '@/mixins/SocketHandler'

export default {
  mixins: [ SocketHandler ],
  components: {
    JetGameHeader,
    JetGameFooter,
  },
  props: {
    habbo_swf: String,
    variables: Object,
    params: Object
  },
  data () {
    return {
      // connected: true,
      memberships: [
        {
          type: 'hc',
          icon: 'hc.png',
          end_date: moment().add(800, 'days').startOf(),
        }
      ],
      currencies: [
        {
          type: 'credits',
          icon: '-1.png',
          amount: 999999,
        },
        {
          type: 'duckets',
          icon: '0.png',
          amount: 999999,
        },
        {
          type: 'duckets',
          icon: '5.png',
          amount: 999999,
        },
      ]
    }
  },
  mounted() {
    this.initialiseExternalInterface()
    this.initialiseClient()
  },
  metaInfo () {
    return {
      title: `${this.$page.sitename} - Client`,
    }
  },
  methods: {
    initialiseExternalInterface () {
      if (typeof window.FlashExternalnterface === 'undefined') window.FlashExternalInterface = {}
      window.FlashExternalInterface.legacyTrack = (arg1, arg2, arg3) => this.onLegacyTrack(arg1, arg2, arg3)
    },
    initialiseClient () {
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
    },
    onLegacyTrack(type, value, option) {
      if (type === 'authentication' && value === 'authok') this.createConnection()
    },
    handleHelperTool () {
      console.log('handleHelperTool')
    },
    handleTalentTracker () {
      console.log('handleTalentTracker')
    },
    handleAchievements () {
      console.log('handleAchievements')
    },
    handleMyProfile () {
      console.log('handleMyProfile')
    },
    handleMyRooms () {
      console.log('handleMyRooms')
    },
    handleMysertBox () {
      console.log('handleMysertBox')
    },
    handleForum () {
      console.log('handleForum')
    },
    handleHotelView () {
      console.log('hotel view')
    },
    handleFriends () {
      console.log('friends')
    },
    handleChat () {
      console.log('chat')
    },
    handleInventory () {
      console.log('inventory')
    },
    handleAvatarEditor () {
      console.log('avatar editor')
    },
    handleCamera () {
      console.log('camera')
    },
    handleCatalog () {
      console.log('catalog')
    },
    handleNavigator () {
      console.log('navigation')
    },
    handleFullscreen () {
      if (document.fullscreenElement && document.exitFullscreen) return document.exitFullscreen()
      return document.documentElement.requestFullscreen()
    },
    handleInformation () {
      console.log('information')
    },
    handleLogout () {
      this.$inertia.visit('/logout')
    },
  },
}
</script>
