<template>
  <div class="px-4 pb-4">
    <jet-card :class="{ 'bg-gray-200': item.online == 0, 'bg-green-400': item.online == 1, 'text-white': item.online == 1 }" class="flex items-center px-4 py-1">
      <img :src="`/habbo-imaging/avatarimage?figure=${item.look}&headonly=true&gesture=${item.online == 1 ? 'sml' : 'eyb'}`" :alt="item.username" class="-ml-4 -my-1 mr-2" />
      <p class="font-bold flex-1">{{ item.username }}</p>
      <img :src="`${$page.cpath}/c_images/album1584/${item.permissions.badge}.gif`" :alt="item.username" class="" />
    </jet-card>
  </div>
</template>

<script>
import JetCard from './Card';
export default {
  components: {
    JetCard,
  },
  props: {
    item: Object,
  }
}
</script>
