<template>
  <section>
    <jet-card class="p-6 mb-12">
      <div class="flex flex-wrap -mx-4">
        <div class="w-full px-4 md:w-1/2">
          <jet-card class="flex items-center h-32 p-6 mb-4 overflow-hidden bg-gray-600 bg-cover bg-bottom bg-no-repeat" style="background-image: url('/images/user-bg.png')">
            <img src="https://pabbo-hotel.com/habbo-imaging/avatarimage?direction=2&head_direction=2" :alt="me.data.username" class="self-start flex-shrink-0 -mt-10 h-48 w-auto drop-shadow mr-4" />
            <div class="hidden relative flex-1 text-white py-2 px-4 md:block">
              <div class="absolute left-0 top-0 w-full h-full bg-gray-800 opacity-50 rounded-lg" />
              <p class="relative text-3xl mb-1">{{ me.data.username }}</p>
              <p class="relative ">{{ me.data.motto || 'No motto' }}</p>
            </div>
          </jet-card>
          <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4 md:w-1/2">
              <jet-card class="flex mb-4 h-24 bg-yellow-300 md:mb-0">
                <div class="flex justify-center items-center w-24 h-24 bg-yellow-400 rounded-l-lg flex-shrink-0">
                  <img src="/images/credits.png" alt="Credits" class="w-8 drop-shadow" />
                </div>
                <div class="flex justify-center items-center flex-1 p-6 overflow-hidden truncate">
                  <p class="text-xl">{{ me.data.credits }}</p>
                </div>
              </jet-card>
            </div>
            <div class="w-full px-4 md:w-1/2">
              <jet-card class="flex mb-4 h-24 bg-purple-300 md:mb-0">
                <div class="flex justify-center items-center w-24 h-24 bg-purple-400 rounded-l-lg flex-shrink-0">
                  <img src="/images/duckets.png" alt="Duckets" class="w-8 drop-shadow" />
                </div>
                <div class="flex justify-center items-center flex-1 p-6 overflow-hidden truncate">
                  <p class="text-xl">{{ me.data.credits }}</p>
                </div>
              </jet-card>
            </div>
          </div>
        </div>
        <div class="w-full px-4 md:w-1/2">
          <inertia-link href="/game">
            <jet-card class="flex justify-center items-center cursor-pointer h-32 p-6 mb-4 bg-blue-500 bg-cover bg-bottom bg-no-repeat" style="background-image: url('/images/client-bg.png')">
              <p class="text-2xl text-white md:text-4xl">Enter {{ shortname }}</p>
            </jet-card>
          </inertia-link>
          <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4 md:w-1/2">
              <jet-card class="flex mb-4 h-24 bg-blue-300 md:mb-0">
                <div class="flex justify-center items-center w-24 h-24 bg-blue-400 rounded-l-lg flex-shrink-0">
                  <img src="/images/diamonds.png" alt="Diamonds" class="w-8 drop-shadow" />
                </div>
                <div class="flex justify-center items-center flex-1 p-6 overflow-hidden truncate">
                  <p class="text-xl">{{ me.data.credits }}</p>
                </div>
              </jet-card>
            </div>
            <div class="w-full px-4 md:w-1/2">
              <jet-card class="flex h-24 bg-gray-500">
                <div class="flex justify-center items-center w-24 h-24 bg-gray-600 rounded-l-lg flex-shrink-0">
                  <img src="/images/vip.png" alt="VIP" class="w-8 drop-shadow" />
                </div>
                <div class="flex justify-center items-center flex-1 p-6 overflow-hidden truncate">
                  <p class="text-xl">{{ me.data.permissions.rank_name }}</p>
                </div>
              </jet-card>
            </div>
          </div>
        </div>
      </div>
    </jet-card>

    <jet-news-articles
      :items="articles"
      :perLine="3"
    />
  </section>
</template>

<script>
import Layout from "@/layouts/master";
import JetCard from "@/components/Card";
import JetCardTitle from "@/components/CardTitle";
import JetButton from "@/components/Button";
import JetNewsArticles from "@/components/NewsArticles";
export default {
  layout: Layout,
  components: {
    JetCard,
    JetCardTitle,
    JetButton,
    JetNewsArticles,
  },
  props: {
    me: Object,
    socials: Array,
    shortname: String,
    articles: Object
  },
  metaInfo () {
    return {
      title: `${this.$page.sitename} - ${this.me.data.username}`,
    }
  },
};
</script>

