<template>
  <section class="w-full">
    <jet-card
      v-if="empty"
      class="w-full bg-gray-300 text-white text-center font-bold p-4 mx-4 mb-4"
    >There are no news articles to display</jet-card>
    <div class="flex flex-wrap -mx-4">
      <jet-article-item
        v-for="(item, index) in articles"
        :key="index"
        :item="item"
        :width="`w-1/${perLine}`"
      />
    </div>
    <div v-if="typeof items.current_page !== 'undefined'">
      <jet-pagination
        :current_page="items.current_page"
        :next_page_url="items.next_page_url"
        :prev_page_url="items.prev_page_url" 
      />
    </div>
  </section>
</template>

<script>
import JetCard from "./Card";
import JetArticleItem from "./ArticleItem";
import JetPagination from "./Pagination";
export default {
  components: {
    JetCard,
    JetArticleItem,
    JetPagination
  },
  props: {
    perLine: {
      type: Number,
      default: 2
    },
    items: {
      type: Array | Object,
      required: true
    }
  },
  computed: {
    empty() {
      return this.articles.length === 0;
    },
    articles() {
      if (typeof this.items.data !== "undefined") return this.items.data;
      return this.items;
    }
  }
};
</script>