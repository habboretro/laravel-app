<template>
  <nav class="py-4 hidden items-center md:flex">
    <component :is="$page.me ? 'inertia-link' : 'a'" :href="$page.me ? '/me' : '/'" class="mr-2">
      <jet-button>Homepage</jet-button>
    </component>
    <component :is="$page.me ? 'inertia-link' : 'a'" href="/news" class="mr-2">
      <jet-button>News</jet-button>
    </component>
    <component :is="$page.me ? 'inertia-link' : 'a'" href="/highscores" class="mr-2">
      <jet-button>Highscores</jet-button>
    </component>
    <component :is="$page.me ? 'inertia-link' : 'a'" href="/staff" class="mr-2">
      <jet-button>Staff</jet-button>
    </component>
    <component :is="$page.me ? 'inertia-link' : 'a'" href="/store" class="mr-2">
      <jet-button>Store</jet-button>
    </component>
    <inertia-link v-if="$page.me" href="/settings/email" class="mr-2">
      <jet-button>Account Settings</jet-button>
    </inertia-link>

    <jet-button class="ml-auto mr-2">
      <i class="fas fa-users mr-2"></i>
      <span>{{ `${$page.user_count} ${$page.shortname}'s Online` }}</span>
    </jet-button>

    <a v-if="$page.me && $page.me.id" href="/logout">
      <jet-button class="bg-red-500 hover:bg-red-600 active:bg-red-600">Logout</jet-button>
    </a>
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
