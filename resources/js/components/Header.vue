<template>
<header class='bg-gray-800 pb-24 shadow'>
  <div class="container mx-auto px-4 md:px-0">
    <div class="flex py-8 items-center md:border-b md:border-gray-600">
      <jet-logo class="mr-10" />

      <div class="hidden flex-1 mr-4 md:block">
        <inertia-link href="/downloads">
          <jet-button class="bg-teal-500 mr-4 hover:bg-teal-600 active:bg-teal-600">Download our client</jet-button>
        </inertia-link>
      </div>

      <div class="ml-auto">
        <jet-dropdown align="right" class="w-32">
          <div slot="trigger" class="flex items-center justify-end">
            <div v-if="$page.me" class="flex items-center">
              <div class="flex items-center justify-center w-12 h-12 border-2 border-white rounded-full float-right bg-gray-900 mr-4">
                <img src="/habbo-imaging/avatarimage?headonly=1" alt="avatar" />
              </div>
              <i class="fas fa-chevron-down text-sm text-white" />
            </div>
            <jet-button v-else>
              <i class="fas fa-bars text-xl" />
            </jet-button>
          </div>

          <div slot="content">
            <inertia-link href="/" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Homepage</inertia-link>
            <inertia-link href="/news" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">News</inertia-link>
            <inertia-link href="/highscores" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Highscores</inertia-link>
            <inertia-link href="/staff" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Staff</inertia-link>
            <inertia-link href="/store" class="block px-4 py-2 text-sm leading-5 text-gray-700 border-b hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Store</inertia-link>
            <inertia-link v-if="$page.me" href="/settings/email" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Account Settings</inertia-link>
            <inertia-link href="/downloads" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Download Client</inertia-link>
            <inertia-link v-if="!$page.me" href="/login" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Login</inertia-link>
            <inertia-link v-if="!$page.me" href="/register" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Register</inertia-link>
            <inertia-link v-if="$page.me" href="/nitro" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Enter Beta</inertia-link>
            <inertia-link v-if="$page.me" href="/game" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Enter Client</inertia-link>
            <inertia-link v-if="$page.me" href="/logout" class="block px-4 py-2 text-sm leading-5 text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:bg-red-600 transition duration-150 ease-in-out">Logout</inertia-link>
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
