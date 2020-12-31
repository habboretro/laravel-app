<template>
  <div id="client" class="w-screen h-screen">{{ article }}</div>
</template>

<script>
import Layout from "@/layouts/master";
export default {
  layout: Layout,
  props: {
    article: Object
  }
};
</script>
