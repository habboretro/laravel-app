<template>
  <section class="z-50 absolute inset-0 w-screen h-screen">
    <div class="absolute inset-0 bg-black opacity-50" @click="$emit('exit')" />
    <transition leave-active-class="transition ease-in duration-1000" leave-class="opacity-100" leave-to-class="opacity-0">
      <div class="relative flex items-center justify-center w-full h-full">
        <jet-card class="border border-black bg-gray-100 overflow-auto w-full max-h-screen max-w-2xl">
          <div class="relative px-4 py-2" style="background-color: #14799a;">
            <div class="text-white text-sm font-bold text-center">{{ title }}</div>
            <div class="cursor-pointer my-auto rounded-lg mx-2 absolute flex justify-center items-center right-0 top-0 bottom-0 w-6 h-6 px-2 bg-red-500 border border-black hover:bg-red-600" @click="$emit('exit')">
              <i class="text-white fas fa-times" />
            </div>
          </div>
          <div v-if="!box.id" class="p-4">
            <div class="flex flex-wrap">
              <jet-mystery-box-item v-for="(box, index) in boxes" :key="index" :box="box" @click="fetchBox(box)" />
            </div>
          </div>
          <jet-mystery-box-game v-else :box="box" @back="reset" />
        </jet-card>
      </div>
    </transition>
  </section>
</template>

<script>
import axios from 'axios'
import JetCard from '../Card'
import JetButton from '../Button'
import JetMysteryBoxItem from './Item'
import JetMysteryBoxGame from './Game'
export default {
  components: {
    JetCard,
    JetButton,
    JetMysteryBoxItem,
    JetMysteryBoxGame,
  },
  data () {
    return {
      box: {},
      boxes: [],
      loading: false,
    }
  },
  computed: {
    title () {
      if (this.loading) return 'Loading'
      return this.box.id ? this.box.name : 'Mystery Boxes'
    }
  },
  mounted () {
    this.fetchBoxes()
  },
  methods: {
    reset () {
      this.box = {}
    },
    fetchBox (box) {
      this.loading = true
      axios.get(`/api/boxes/${box.id}`)
        .then(({ data: box }) => {
          this.loading = false
          this.box = box
        })
    },
    fetchBoxes () {
      this.loading = true
      axios.get('/api/boxes')
        .then(({ data: boxes }) => {
          this.loading = false
          this.boxes = boxes
        })
    }
  }
}
</script>
