<template>
  <a :href="social.link" target="_blank" rel="noopener noreferrer" class="w-full block">
    <jet-button :class="social.color_classes" class="w-full justify-center py-3">
      <i :class="social.icon" class="text-lg mr-4" />
      <span>{{ social.text }}</span>
    </jet-button>
  </a>
</template>

<script>
import JetButton from "./Button";
export default {
  components: {
    JetButton
  },
  props: {
    social: Object
  }
};
</script>