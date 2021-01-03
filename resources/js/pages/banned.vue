<template>
  <section class="flex flex-wrap items-start -mx-4">
    <div class="w-full md:flex-1 px-4 mb-4">
      <jet-card class="p-4">
        <jet-title-card class="mb-4">You have been banned!</jet-title-card>
        <div class="p-4 bg-red-500 text-white rounded-lg">
          <p class="mb-4"><strong>Reason:</strong> {{ ban.ban_reason }}</p>
          <p><strong>Expires:</strong> {{ ban.ban_expire | formatDate }}</p>
        </div>
      </jet-card>
    </div>
    <div class="w-full md:w-1/3 px-4 mb-4">
      <jet-card class="p-4 mb-4">
        <jet-title-card class="mb-4">Last 10 Chatlogs</jet-title-card>
        <div v-for="(chatlog, index) of chatlogs" :key="index" :class="{ 'bg-white': index % 2 !== 0, 'bg-gray-200': index % 2 == 0 }" class="py-2 px-4">{{ chatlog.message }}</div>
      </jet-card>
    </div>
  </section>
</template>

<script>
import moment from 'moment'
import Layout from '@/layouts/master'
import JetCard from '@/components/Card'
import JetTitleCard from '@/components/TitleCard'
export default {
  layout: Layout,
  components: {
    JetCard,
    JetTitleCard,
  },
  props: {
    ban: Object,
    chatlogs: Array,
  },
  filters: {
    formatDate (date) {
      return moment.unix(date).format('MM/DD/YYYY H:m')
    }
  },
  metaInfo () {
    return {
      title: `${this.$page.sitename} - You've been banned`,
    }
  },
}
</script>