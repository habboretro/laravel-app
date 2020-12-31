<template>
  <div class="px-4 pb-4">
    <jet-card>
      <div class="flex items-center text-sm text-gray-500 uppercase border-b px-4 py-2">
        <p class="flex-1 text-left">User</p>
        <p class="flex-1 text-right">{{ type }}</p>
      </div>
      <div v-if="items.length === 0" class="p-4">
        <jet-card class="bg-gray-300 text-white text-center font-bold p-4">There are no users in this section.</jet-card>
      </div>
      <div v-for="(item, index) in items" :key="index" class="flex items-center py-2 px-4 border-b">
        <img :src="`/habbo-imaging/avatarimage?figure=${item.look}&headonly=true&head_direction=2`" :alt="item.username" class="mr-4" />
        <p class="font-bold flex-1">{{ item.username }}</p>
        <p class="font-bold text-lg">{{ item.amount }}</p>
      </div>
    </jet-card>
  </div>
</template>

<script>
import JetCard from './Card'
export default {
  components: {
    JetCard,
  },
  props: {
    items: Array,
    type: String,
  }
}
</script>