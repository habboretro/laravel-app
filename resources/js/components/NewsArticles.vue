<template>
  <section v-if="items.data.length > 0">
    <div v-if="!hideTitle" class="flex items-center mb-12">
      <h1 class="font-bold text-4xl">Latest Articles</h1>
      <inertia-link v-if="!hideMore" href="/news" class="ml-auto">
        <jet-button>
          <span class="mr-4">View More</span>
          <i class="fas fa-chevron-right"></i>
        </jet-button>
      </inertia-link>
    </div>

    <div class="flex flex-wrap -mx-4 mb-6">
      <jet-news-article
        v-for="(item, index) in articles"
        :key="index"
        :item="item"
        :width="`w-1/${perLine}`"
      />
    </div>

    <div v-if="typeof items.meta !== 'undefined'">
      <jet-pagination
        :current_page="items.meta.current_page"
        :next_page_url="items.meta.next_page_url"
        :prev_page_url="items.meta.prev_page_url"
      />
    </div>
  </section>
</template>

<script>
import JetCard from "./Card";
import JetNewsArticle from "./NewsArticle";
import JetButton from "./Button";
import JetPagination from "./Pagination";
export default {
  components: {
    JetCard,
    JetButton,
    JetNewsArticle,
    JetPagination
  },
  props: {
    hideTitle: {
      type: Boolean,
      default: false,
    },
    hideMore: {
      type: Boolean,
      default: false,
    },
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
