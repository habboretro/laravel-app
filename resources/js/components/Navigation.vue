<template>
  <nav class="py-4 hidden items-center md:flex">
    <inertia-link href="/me" class="mr-2">
      <jet-button>Homepage</jet-button>
    </inertia-link>
    <inertia-link href="/news" class="mr-2">
      <jet-button>News</jet-button>
    </inertia-link>
    <inertia-link href="/highscores" class="mr-2">
      <jet-button>Highscores</jet-button>
    </inertia-link>
    <inertia-link href="/staff" class="mr-2">
      <jet-button>Staff</jet-button>
    </inertia-link>
    <inertia-link href="/store" class="mr-2">
      <jet-button>Store</jet-button>
    </inertia-link>
    <inertia-link v-if="$page.me" href="/settings/email" class="mr-2">
      <jet-button>Account Settings</jet-button>
    </inertia-link>

    <jet-button class="ml-auto mr-2">
      <i class="fas fa-users mr-2"></i>
      <span>{{ `${$page.user_count} ${$page.shortname}'s Online` }}</span>
    </jet-button>
  </nav>
</template>

<script>
import JetButton from './Button'
export default {
  components: {
    JetButton,
  }
}
</script>
