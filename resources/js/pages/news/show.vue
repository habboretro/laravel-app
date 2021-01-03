<template>
  <section class="flex flex-wrap md:-mx-4">
    <div class="w-full md:px-4 md:flex-1 mb-4">
      <jet-card class="px-4 py-4 pb-12">
        <jet-card class="p-4 text-white text-center bg-cover bg-center rounded-lg mb-4" :style="`background-image: url('/storage/${article.image}');`">
          <div class="relative w-full py-4">
            <div class="absolute inset-0 bg-black opacity-50 rounded-lg" />
            <div class="relative z-10">
              <p class="font-bold text-3xl">{{ article.title }}</p>
              <p>{{ article.short_story }}</p>
            </div>
          </div>
        </jet-card>
        <div v-html="article.full_story" class="fr-view" />
      </jet-card>
    </div>
    <div class="w-full md:px-4 md:w-1/3">
      <jet-card class="p-4">
        <jet-title-card class="mb-4">Author</jet-title-card>
        <div class="flex items-center">
          <div class="flex items-center justify-center w-16 h-16 bg-green-400 rounded-full border-4 border-green-500 mr-4">
            <img :src="`/habbo-imaging/avatarimage?figure=${article.user ? article.user.look : 'wa-3264-1329-1408.lg-3257-110.sh-3016-110.hr-831-61.fa-1204-0.ch-3059-110.he-3258-93-96.hd-180-1'}&headonly=true`" :alt="article.user ? article.user.username : `${$page.shortname} Team`" class="drop-shadow" />
          </div>
          <div class="flex-1">
            <p class="font-bold mb-1">Posted by {{ article.user ? article.user.username : `${$page.shortname} Team` }}</p>
            <p class="text-sm">{{ article.created_at | formatDate }}</p>
          </div>
        </div>
      </jet-card>
    </div>
  </section>
</template>

<script>
import moment from "moment";
import Layout from "@/layouts/master";
import JetCard from "@/components/Card";
import JetTitleCard from "@/components/TitleCard";
export default {
  layout: Layout,
  components: {
    JetCard,
    JetTitleCard,
  },
  props: {
    article: Object
  },
  filters: {
    formatDate(date) {
      return moment(date).format('MMMM d, YYYY');
    }
  },
  metaInfo () {
    return {
      title: `${this.$page.sitename} - ${this.article.title}`,
    }
  },
};
</script>
