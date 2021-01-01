<template>
  <section>
    <jet-card class="max-w-3xl px-4 py-4 pb-12 mx-auto">
      <jet-card class="p-4 bg-cover bg-center rounded-lg mb-4" :style="`background-image: url('${article.image}');`">
        <p class="font-bold text-3xl">{{ article.title }}</p>
        <p>Posted by {{ article.user ? article.user.username : 'The Laravel Team' }} on the {{ article.created_at | formatDate}}</p>
      </jet-card>
      <div v-html="article.full_story" />
    </jet-card>
  </section>
</template>

<script>
import moment from "moment";
import Layout from "@/layouts/master";
import JetCard from "@/components/Card";
export default {
  layout: Layout,
  components: {
    JetCard,
  },
  props: {
    article: Object
  },
  filters: {
    formatDate(date) {
      return moment(date).format('MMMM d, YYYY');
    }
  }
};
</script>
