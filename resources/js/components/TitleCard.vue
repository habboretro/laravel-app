<template>
  <div class="flex items-center px-4 py-2 rounded-lg bg-green-400 shadow">
    <span class="font-bold text-white">
      <slot />
    </span>
    <i v-if="icon" :class="icon" class="text-white ml-auto" />
  </div>
</template>

<script>
export default {
  props: {
    icon: {
      type: String | null,
      default: null
    }
  }
};
</script>