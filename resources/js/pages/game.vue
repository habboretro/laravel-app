<template>
  <section>
    <jet-client-buttons />
    <div id="client" class="bg-black flex items-center justify-center w-screen h-screen">
      <jet-client-instructions />
    </div>
  </section>
</template>

<script>
import JetClientInstructions from '@/components/ClientInstructions'
import JetClientButtons from '@/components/ClientButtons'
export default {
  components: {
    JetClientInstructions,
    JetClientButtons,
  },
  props: {
    habbo_swf: String,
    variables: Object,
    params: Object
  },
  mounted() {
    swfobject.embedSWF(
      this.habbo_swf,
      "client",
      "100%",
      "100%",
      "11.1.0",
      "/js/expressInstall.swf",
      this.variables,
      this.params,
      null,
      null
    );
  },
  metaInfo () {
    return {
      title: `${this.$page.sitename} - Client`,
    }
  },
};
</script>
