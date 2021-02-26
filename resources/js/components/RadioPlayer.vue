<template>
  <div class="flex items-center bg-white shadow-lg p-2 rounded-full pointer-events-auto">
    <div class="relative w-12 h-12 flex-shrink-0 mr-2">
      <div class="z-10 position absolute inset-0 w-3 h-3 bg-white rounded-full shadow-lg border m-auto" />
      <img class="animate-spin object-cover w-full rounded-full shadow-lg" :alt="song.track" :src="song.cover" />
    </div>
    <div v-if="visible" class="w-48 mr-2">
      <p class="text-sm truncate">{{ song.artist }}</p>
      <p class="text-xs text-gray-600 truncate">{{ song.track }}</p>
    </div>
    <jet-dropdown align="right" class="mr-2" content-classes="flex justify-center items-center py-1 px-2 mt-4 rounded-full bg-white">
      <template #trigger>
        <button v-if="visible" class="block w-8 h-8 text-white rounded-full bg-blue-300 hover:bg-blue-400 focus:outline-none">
          <i :class="volumeClasses" class="fas text-sm" />
        </button>
      </template>
      <template #content>
        <input v-model="currentVolume" type="range" min="0" max="100">
      </template>
    </jet-dropdown>
    <button v-if="visible" class="block w-10 h-10 text-white rounded-full bg-blue-300 hover:bg-blue-400 focus:outline-none mr-2" @click="$emit('play')">
      <i :class="playing ? 'fa-pause' : 'fa-play'" class="fas text-sm" />
    </button>
    <i :class="visible ? 'fa-chevron-left' : 'fa-chevron-right'" class="cursor-pointer fas text-sm hover:text-gray-700" @click="$emit('toggle')" />
  </div>
</template>

<script>
import JetDropdown from '@/components/Dropdown'
export default {
  components: { JetDropdown },
  data () {
    return {
      currentVolume: 30,
    }
  },
  mounted () {
    this.currentVolume = this.volume
  },
  watch: {
    currentVolume (volume) {
      this.$emit('volume', volume)
    },
  },
  computed: {
    volumeClasses () {
      if (this.volume > 70) return 'fa-volume-up'
      if (this.volume <= 70 && this.volume >= 30) return 'fa-volume-down'
      if (this.volume < 30 && this.volume > 0) return 'fa-volume-off'
      return 'fa-volume-mute'
    },
  },
  props: {
    volume: {
      type: Number|String,
      default: 30,
    },
    playing: {
      type: Boolean,
      default: true,
    },
    visible: {
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
