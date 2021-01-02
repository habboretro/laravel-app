<template>
  <div v-show="!!$page.flash.success" class="text-sm text-white px-4 py-2 bg-green-400 rounded-lg">
    {{ $page.flash.success }}
  </div>
</template>
