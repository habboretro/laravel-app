<template>
  <div class="w-full flex justify-center">
    <inertia-link :href="prev_page_url" preserve-scroll>
      <jet-button :disabed="prev_page_url === null" :class="{ 'opacity-50': prev_page_url === null }" class="mr-4">Previous</jet-button>
    </inertia-link>
    <inertia-link :href="next_page_url" preserve-scroll>
      <jet-button :disabled="next_page_url === null" :class="{ 'opacity-50': next_page_url === null }">Next</jet-button>
    </inertia-link>
  </div>
</template>

<script>
import JetButton from './Button'
export default {
  components: {
    JetButton,
  },
  props: {
    current_page: Number,
    next_page_url: String | null,
    prev_page_url: String | null,
  }
}
</script>
