<template>
  <div v-show="!!$page.flash.error" class="text-sm text-white px-4 py-2 bg-red-500 rounded-lg">
    {{ $page.flash.error }}
  </div>
</template>
