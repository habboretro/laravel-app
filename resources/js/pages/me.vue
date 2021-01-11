<template>
  <section>
    <jet-card
      class="flex items-center p-4 mb-4 bg-cover bg-center"
      style="background-image: url('/images/backdrop.png');"
    >
      <div
        class="relative z-10 flex items-center justify-center w-24 h-24 bg-green-400 rounded-full border-4 border-green-500 -mr-8 md:mr-4"
      >
        <img
          src="/habbo-imaging/avatarimage?headonly=true"
          class="drop-shadow"
          :alt="user.username"
        />
      </div>
      <div class="relative flex-1 h-24 rounded-lg overflow-hidden">
        <div class="absolute w-full h-full bg-black opacity-50" />
        <div class="flex items-center relative text-white px-8 py-4 h-full">
          <div class="w-64 truncate">
            <p class="text-2xl">{{ user.username }}</p>
            <p class="w-full text-sm">{{ user.motto }}</p>
          </div>
          <a href="/game" class="hidden ml-auto md:block">
            <jet-button>Enter {{ shortname }}</jet-button>
          </a>
        </div>
      </div>
    </jet-card>

    <div class="flex flex-wrap -mx-4 justify-between">
      <div class="w-full md:flex-1 mx-4">
        <jet-title-card icon="fas fa-newspaper" class="mb-4">Latest Articles</jet-title-card>
        <jet-article-list :items="articles" />
      </div>
      <div class="w-full md:w-1/3 mx-4">
        <jet-social-link
          v-for="(social, index) in socials"
          :key="index"
          :social="social"
          class="mb-4"
        />
        <iframe :src="`https://discordapp.com/widget?id=${$page.discord_id}&theme=dark`" width="100%" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
      </div>
    </div>
  </section>
</template>

<script>
import Layout from "@/layouts/master";
import JetCard from "@/components/Card";
import JetTitleCard from "@/components/TitleCard";
import JetButton from "@/components/Button";
import JetSocialLink from "@/components/SocialLink";
import JetArticleList from "@/components/ArticleList";
export default {
  layout: Layout,
  components: {
    JetCard,
    JetTitleCard,
    JetButton,
    JetSocialLink,
    JetArticleList
  },
  props: {
    user: Object,
    socials: Array,
    shortname: String,
    articles: Array
  },
  metaInfo () {
    return {
      title: `${this.$page.sitename} - ${this.user.username}`,
    }
  },
};
</script>

