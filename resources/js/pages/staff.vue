<template>
  <section class="flex flex-wrap items-start -mx-4">
    <div class="w-full md:flex-1 px-4 mb-4">
      <jet-card class="p-4 h-20 bg-cover mb-4" style="background-image: url('/images/coffee-house.png')" />
      <jet-card class="p-4">
        <jet-title-card class="mb-4">{{ $page.shortname }} Staff</jet-title-card>
        <div class="flex flex-wrap -mx-4">
          <jet-staff-item v-for="(item, index) of users" :key="index" :item="item" class="w-full md:w-1/2" />
        </div>
      </jet-card>
    </div>
    <div class="w-full md:w-1/3 px-4 mb-4">
      <jet-card class="p-4 mb-4">
        <jet-title-card class="mb-4">About {{ $page.shortname }} Staff</jet-title-card>
        <p class="px-2 text-sm mb-4">The {{ $page.shortname }} staff team is one big happy family, each staff member has a different role and duties to fulfill.</p>
        <p class="px-2 text-sm">Most of our team usually consists of players that have been around {{ $page.shortname }} for quite a while, but this doesn't mean we only recruit old & known players, we recruit those who shine out to us!</p>
      </jet-card>
      <jet-card class="p-4 mb-4">
        <jet-title-card class="mb-4">How do I join the team?</jet-title-card>
        <p class="px-2 text-sm">Every couple of months staff applications may open up, giving users a chance to join the team, though we also like to handpick users that we feel are worthy of a trial. Things that we look out for are professionalism, a clear record, friendly & a frequent event host.</p>
      </jet-card>
    </div>
  </section>
</template>

<script>
import Layout from "@/layouts/master";
import JetCard from "@/components/Card";
import JetTitleCard from "@/components/TitleCard";
import JetStaffItem from "@/components/StaffItem";
export default {
  layout: Layout,
  components: {
    JetCard,
    JetTitleCard,
    JetStaffItem,
  },
  props: {
    users: Array
  },
  metaInfo () {
    return {
      title: `${this.$page.sitename} - Staff`,
    }
  },
};
</script>
