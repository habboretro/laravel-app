<template>
  <div class="w-full md:w-1/3 px-4 mb-4">
    <div class="cursor-pointer" @click="$emit('click')">
      <img :src="box.image" :alt="box.name" class="block mx-auto w-32 mb-1" />
      <p class="text-center text-lg font-bold truncate">{{ box.name }}</p>
      <p class="text-center text-xs text-gray-500">{{ price }}</p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    box: Object,
  },
  computed: {
    price () {
      if (this.box.currency_type === 'balance') return `£${this.box.price}`
      if (this.box.currency_type === 'credits') return `${Math.round(this.box.price)} Credits`
      if (this.box.currency_type === 'diamonds') return `${Math.round(this.box.price)} Diamonds`
      return 'Free'
    }
  }
}
</script>
