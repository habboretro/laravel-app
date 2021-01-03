<template>
  <section>
    <jet-title-card icon="fas fa-trophy" class="mb-4">Highscores</jet-title-card>
    <div class="flex flex-wrap -mx-4">
      <jet-highscore-card :items="duckets" type="Duckets" class="w-full md:w-1/3" />
      <jet-highscore-card :items="diamonds" type="Diamonds" class="w-full md:w-1/3" />
      <jet-highscore-card :items="credits" type="Credits" class="w-full md:w-1/3" />
      <jet-highscore-card :items="achievements" type="Achievements" class="w-full md:w-1/3" />
      <jet-highscore-card :items="respects" type="Respects" class="w-full md:w-1/3" />
    </div>
  </section>
</template>

<script>
import Layout from "@/layouts/master";
import JetTitleCard from "@/components/TitleCard";
import JetCard from "@/components/Card";
import JetHighscoreCard from "@/components/HighScoreCard";
export default {
  layout: Layout,
  components: {
    JetTitleCard,
    JetCard,
    JetHighscoreCard,
  },
  props: {
    duckets: Array,
    diamonds: Array,
    credits: Array,
    achievements: Array,
    respects: Array
  },
  metaInfo () {
    return {
      title: `${this.$page.sitename} - Highscores`,
    }
  },
};
</script>
