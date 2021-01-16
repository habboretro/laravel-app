<template>
  <inertia-link :href="`/news/${item.slug}`" class="w-full px-4 pb-4 md:w-1/3">
    <article>
      <jet-card class="cursor-pointer overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
        <div class="relative overflow-hidden h-32">
          <p class="absolute right-0 top-0 bg-white text-xs px-2 py-1 rounded-lg shadow m-4">{{ item.created_at | humanReadable }}</p>
          <img :src="item.image" :alt="item.slug" class="object-cover min-w-full min-h-full" />
        </div>
        <div class="p-4">
          <p class="text-purple-900 text-lg font-bold mb-2">{{ item.title }}</p>
          <p class="text-sm italic">{{ item.short_story }}</p>
        </div>
      </jet-card>
    </article>
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
