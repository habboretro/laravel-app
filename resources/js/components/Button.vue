<template>
  <button
    :type="type"
    class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 active:bg-green-600 focus:outline-none focus:border-green-600 focus:shadow-outline-green transition ease-in-out duration-150"
    @click="$emit('click')"
  >
    <i v-if="loading" class="fas fa-circle-notch fa-spin" />
    <slot v-else />
  </button>
</template>

<script>
export default {
  props: {
    loading: {
      type: Boolean,
      default: false,
    },
    type: {
      type: String,
      default: "submit",
    },
  },
};
</script>
