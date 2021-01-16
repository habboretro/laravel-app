<template>
  <section>
    <jet-news-articles
      :items="articles"
      :perLine="3"
      hideTitle
    />
  </section>
</template>

<script>
import Layout from "@/layouts/master";
import JetCard from "@/components/Card";
import JetNewsArticles from "@/components/NewsArticles";
export default {
  layout: Layout,
  components: {
    JetCard,
    JetNewsArticles,
  },
  props: {
    articles: Object
  },
  metaInfo () {
    return {
      title: `${this.$page.sitename} - News Articles`,
    }
  },
};
</script>
