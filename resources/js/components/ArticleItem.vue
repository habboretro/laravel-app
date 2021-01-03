<template>
  <div :class="`md:${width}`" class="w-full px-4 pb-4">
    <inertia-link :href="`/news/${item.slug}`" class="block">
      <jet-card>
        <div class="overflow-hidden h-32">
          <img :src="`/storage/${item.image}`" :alt="item.slug" class="object-cover min-w-full min-h-full" />
        </div>
        <div class="p-4">
          <p class="text-green-500 font-bold mb-4">{{ item.title }}</p>
          <p class="text-gray-500 font-light text-sm">{{ item.short_story }}</p>
        </div>
        <div class="flex items-center px-4 py-2 bg-gray-200 rounded-b">
          <p class="font-bold text-xs">{{ item.user ? item.user.username : `${$page.shortname} Team`  }}</p>
          <p class="text-xs ml-auto">{{ item.created_at | humanReadable }}</p>
        </div>
      </jet-card>
    </inertia-link>
  </div>
</template>

<script>
import JetCard from "./Card";
import moment from "moment";
export default {
  components: {
    JetCard
  },
  props: {
    width: {
      type: String,
      default: "w-1/3"
    },
    item: {
      type: Array | Object,
      required: true
    }
  },
  filters: {
    humanReadable (date) {
      return moment(date).fromNow()
    }
  }
};
</script>