<template>
  <footer class="py-12 text-white bg-gray-800">
    <div class="container mx-auto px-4 md:px-0">
      <div class="flex flex-wrap justify-center">
        <jet-logo class="mb-4" />
      </div>
      <a href="https://github.com/habboretro/laravel-app" target="_blank" rel="noopener noreferrer" class="block text-center text-xl mb-4">
        <i class="fab fa-github"></i>
      </a>
      <p class="text-center font-bold text-sm">{{ $page.shortname }} is a not for profit educational project.</p>
    </div>
  </footer>
</template>

<script>
import JetLogo from './Logo'
export default {
  components: {
    JetLogo,
  }
}
</script>
