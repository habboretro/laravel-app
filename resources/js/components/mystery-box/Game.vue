<template>
  <section>
    <div v-if="error" class="text-sm px-4 py-2 text-white font-bold bg-red-500">{{ error }}</div>
    <div v-if="prize.id" class="text-sm px-4 py-2 text-white font-bold bg-green-500">{{ success }}</div>
    <div class="relative flex flex-col items-center justify-center px-4 py-8 bg-gray-800">
      <jet-button :disabled="loading" class="absolute m-4 left-0 top-0" @click="$emit('back')">
        <i class="fas fa-chevron-left mr-2" />
        <span>Back</span>
      </jet-button>
      <img :src="prize.image || box.image" :alt="box.name" class="h-28 mx-auto mb-4" />
      <jet-button :loading="loading" :disabled="loading" @click="purchaseBox">Open for {{ price }}</jet-button>
    </div>
    <div class="p-4">
      <p class="block text-lg font-bold mb-4">Box contains 📦</p>
      <div class="flex flex-wrap -mx-4">
        <div v-for="(prize, index) of box.prizes" :key="index" class="w-full md:w-1/3 px-4 mb-4">
          <jet-card class="p-4">
            <div class="relative flex justify-center items-center bg-gray-200 p-4 mb-4">
              <img :src="prize.image" :alt="prize.name" class="h-24" />
              <div class="flex items-center justify-center text-white font-bold absolute right-0 top-0 m-2 bg-green-400 rounded-lg w-8 h-8">x{{ prize.quantity }}</div>
            </div>
            <p class="font-bold mb-2">{{ prize.name }}</p>
            <p class="text-right text-gray-500 text-xs">{{ prize.percentage }}%</p>
          </jet-card>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from 'axios'
import JetButton from '../Button'
import JetCard from '../Card'
export default {
  components: {
    JetButton,
    JetCard
  },
  data () {
    return {
      loading: false,
      error: null,
      prize: {}
    }
  },
  props: {
    box: Object,
  },
  computed: {
    success () {
      if (!this.prize.id) return null
      if (this.prize.quantity > 1 && this.prize.prize_type === 'furni') return `Well done, You just won ${this.prize.quantity} ${this.prize.name}'s!`
      if (this.prize.prize_type === 'furni') return `Well done, You just won a ${this.prize.name}!`
      return `Well done, you just won ${this.prize.name}`
    },
    price () {
      if (this.box.currency_type === 'balance') return `£${this.box.price}`
      if (this.box.currency_type === 'credits') return `${Math.round(this.box.price)} Credits`
      if (this.box.currency_type === 'diamonds') return `${Math.round(this.box.price)} Diamonds`
      return 'Free'
    }
  },
  methods: {
    purchaseBox () {
      this.loading = true
      this.prize = {}
      this.error = null
      axios.post(`/api/boxes/${this.box.id}`)
        .then(({ data: prize }) => {
          this.prize = prize
          this.loading = false
        })
        .catch(({ response: { data: { funds: error } } }) => {
          this.error = error
          this.loading = false
        })
    }
  }
}
</script>
