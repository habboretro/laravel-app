<template>
  <section>
    <jet-title-card icon="fas fa-newspaper" class="mb-4">Latest Articles</jet-title-card>
    <jet-article-list :items="articles" :perLine="3" />
  </section>
</template>

<script>
import Layout from "@/layouts/master";
import JetTitleCard from "@/components/TitleCard";
import JetArticleList from "@/components/ArticleList";
export default {
  layout: Layout,
  components: {
    JetTitleCard,
    JetArticleList,

  },
  props: {
    articles: Object
  }
};
</script>
