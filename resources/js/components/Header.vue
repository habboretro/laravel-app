<template>
<header class='bg-gray-800 pb-24 shadow'>
  <div class="container mx-auto px-4 md:px-0">
    <div class="flex py-8 items-center md:border-b md:border-gray-600 md:shadow">
      <jet-logo class="mr-10" />
      <div class="hidden flex-1 mr-4 md:block">
        <inertia-link href="/downloads">
          <jet-button class="bg-teal-500 mr-4 hover:bg-teal-600 active:bg-teal-600">Download our client</jet-button>
        </inertia-link>
      </div>
      <div class="hidden md:block">
        <inertia-link href="/game">
          <jet-button class="bg-teal-500 hover:bg-teal-600 active:bg-teal-600">
            <i class="fas fa-sign-in-alt mr-2" />
            <span>Enter {{ $page.shortname }}</span>
          </jet-button>
        </inertia-link>
      </div>
      <div class="block ml-auto md:hidden">
        <jet-dropdown align="right" class="w-32">
          <jet-button slot="trigger" class="float-right">
            <i class="text-xl fas fa-bars"></i>
          </jet-button>
          <div slot="content" class="mt-4">
            <component :is="$page.me ? 'jet-dropdown-link' : 'a'" href="/" :class="$page.me ? '' : 'block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out'">Homepage</component>
            <component :is="$page.me ? 'jet-dropdown-link' : 'a'" href="/news" :class="$page.me ? '' : 'block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out'">News</component>
            <component :is="$page.me ? 'jet-dropdown-link' : 'a'" href="/highscores" :class="$page.me ? '' : 'block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out'">Highscores</component>
            <component :is="$page.me ? 'jet-dropdown-link' : 'a'" href="/staff" :class="$page.me ? '' : 'block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out'">Staff</component>
            <component :is="$page.me ? 'jet-dropdown-link' : 'a'" href="/store" :class="$page.me ? '' : 'block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out'">Store</component>
            <jet-dropdown-link v-if="$page.me" href="/settings/email">Account Settings</jet-dropdown-link>
            <a v-if="!$page.me" href="/login" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Login</a>
            <a v-if="!$page.me" href="/register" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Register</a>
            <a v-if="$page.me" href="/logout" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Logout</a>
          </div>
        </jet-dropdown>
      </div>
    </div>
    <jet-navigation />
  </div>
</header>
</template>

<script>
import JetLogo from './Logo'
import JetButton from './Button'
import JetNavigation from './Navigation'
import JetDropdown from './Dropdown'
import JetDropdownLink from './DropdownLink'
export default {
  components: {
    JetLogo,
    JetButton,
    JetNavigation,
    JetDropdown,
    JetDropdownLink,
  }
}
</script>
