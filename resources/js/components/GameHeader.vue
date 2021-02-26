<template>
  <div class="absolute top-0 left-0 right-0 flex items-center p-4 z-10 pointer-events-none">
    <div class="self-start pointer-events-none">
      <jet-dropdown align="left" class="z-50 pointer-events-auto">
        <div slot="trigger">
          <jet-game-button class="text-sm" size="xs" borderSize="2" borderColor="white" backgroundColor="transparent" icon="fas fa-bars" />
        </div>
        <div slot="content">
          <jet-dropdown-link href="/me">
            <i class="fas fa-home mr-2" />
            <span>Home</span>
          </jet-dropdown-link>
          <jet-dropdown-link as="button" @click="$emit('mysteryBox')">
            <i class="fas fa-parachute-box mr-2" />
            <span>Mystery Box</span>
          </jet-dropdown-link>
          <jet-dropdown-link as="button" @click="$emit('toggleRadio')">
            <i class="fas fa-headphones mr-2" />
            <span>{{ radioVisible ? 'Hide' : 'Show' }} Radio</span>
          </jet-dropdown-link>
          <jet-dropdown-link href="/logout" class="bg-red-600 hover:bg-red-700">
            <i class="text-white fas fa-sign-out-alt mr-2" />
            <span class="text-white">Logout</span>
          </jet-dropdown-link>
        </div>
      </jet-dropdown>
    </div>
    <div class="flex justify-end flex-1 pointer-events-none">
      <jet-radio-player :song="song" :visible="radioVisible" :playing="radioPlaying" :volume="radioVolume" class="mr-48" @toggle="$emit('toggleRadio')" @play="$emit('toggleMusic')" @volume="volume => $emit('toggleVolume', volume)" />
    </div>
  </div>
</template>

<script>
import JetGameButton from './GameButton'
import JetDropdown from './Dropdown'
import JetDropdownLink from './DropdownLink'
import JetRadioPlayer from './RadioPlayer'

export default {
  components: {
    JetGameButton,
    JetDropdown,
    JetDropdownLink,
    JetRadioPlayer,
  },
  props: {
    radioVolume: {
      type: Number|String,
      default: 30,
    },
    radioPlaying: {
      type: Boolean,
      default: false,
    },
    radioVisible: {
      type: Boolean,
      default: true,
    },
    song: {
      type: Object,
      default: () => new Object({
        artist: '',
        track: '',
        cover: '',
        playedAt: '',
        playedBy: '',
      })
    },
  },
}
</script>
