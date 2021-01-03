<template>
  <section>
    <div id="client" class="bg-black flex items-center justify-center w-screen h-screen">
      <jet-card class="relative w-full max-w-2xl p-4 bg-green-400 border-4 border-green-500 text-white">
        <img src="/images/frank.png" class="hidden h-64 absolute left-0 top-0 -ml-24 -mt-12 md:block" />
        <div class="md:pl-24">
          <p class="text-4xl mb-4">You're nearly in {{ $page.shortname }}!</p>
          <p class="mb-2">Click the blue button below, to download our client to play from your desktop!</p>
          <p class="mb-2">Click the green button below, then click 'run Flash' when prompted to. See you in the Hotel!</p>
          <p class="text-sm mb-4">Still can't get on? Follow the instructions by <a href="https://support.google.com/chrome/answer/6258784?co=GENIE.Platform%3DDesktop&hl=en" target="_blank" rel="noopener noreferrer" class="font-bold underline">clicking here</a></p>
          <div class="flex justify-end">
            <a href="" target="_blank" rel="noopener noreferrer" class="block mr-4">
              <jet-button class="bg-blue-500 hover:bg-blue-600 active:bg-blue-600 focus:border-blue-600">Download Client</jet-button>
            </a>
            <a href="https://www.adobe.com/go/getflashplayer" target="_blank" rel="noopener noreferrer" class="block">
              <jet-button class="bg-yellow-500 hover:bg-yellow-600 active:bg-yellow-600 focus:border-yellow-600">Enable Flash</jet-button>
            </a>
          </div>
        </div>
      </jet-card>
    </div>
  </section>
</template>

<script>
import JetCard from '@/components/Card'
import JetButton from '@/components/Button'
export default {
  components: {
    JetCard,
    JetButton
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
