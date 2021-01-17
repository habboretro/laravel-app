<template>
  <section>
    <div class="flex flex-wrap -mx-4 mb-12">
      <div class="w-full px-4 mb-4 md:w-1/3 md:mb-0">
        <jet-card class="p-6">
          <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-indigo-100 text-indigo-600">Windows</h3>
          <p class="mt-5 text-base text-gray-500">This download is our bundled i32 and x64 Windows application w/ auto updating support.</p>
          <div class="pt-6">
            <a href="/storage/windows.exe" target="_blank">
              <jet-button class="w-full justify-center mb-4">Download for windows</jet-button>
            </a>
            <jet-button class="w-full justify-center">Virus scan by VirusTotal</jet-button>
          </div>
        </jet-card>
      </div>
      <div class="w-full px-4 mb-4 md:w-1/3 md:mb-0">
        <jet-card class="p-6">
          <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-indigo-100 text-indigo-600">Mac</h3>
          <p class="mt-5 text-base text-gray-500">Same as Windows, built for Mac. Tested on various Mac systems including M1 and Big Sur.</p>
          <div class="pt-6">
            <a href="/storage/osx.dmg" target="_blank">
              <jet-button class="w-full justify-center mb-4">Download for Mac</jet-button>
            </a>
            <jet-button class="w-full justify-center">Virus scan by VirusTotal</jet-button>
          </div>
        </jet-card>
      </div>
      <div class="w-full px-4 mb-4 md:w-1/3 md:mb-0">
        <jet-card class="p-6">
          <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-indigo-100 text-indigo-600">Alternative</h3>
          <p class="mt-5 text-base text-gray-500">Not comfortable with the {{ $page.shortname }} Desktop app? Try this unofficial alternative.</p>
          <div class="pt-6">
            <a href="https://www.maxthon.com/nitro/static.html" target="_blank" rel="noopener noreferrer">
              <jet-button class="w-full justify-center">Download Maxathon Nitro</jet-button>
            </a>
          </div>
        </jet-card>
      </div>
    </div>
    <jet-card class="px-6 py-8   sm:p-10 lg:flex lg:items-center">
      <div class="flex-1">
        <div class="text-lg text-gray-600">Need help? Visit our Discord and ask for help in the #support channel.</div>
      </div>
      <div class="mt-6 rounded-md shadow lg:mt-0 lg:ml-10 lg:flex-shrink-0">
        <a href="https://discord.gg/nG9kPXEcE9" class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50">Visit Discord</a>
      </div>
    </jet-card>
  </section>
</template>

<script>
import Layout from "@/layouts/master";
import JetCard from "@/components/Card";
import JetButton from "@/components/Button";
export default {
  layout: Layout,
  components: {
    JetCard,
    JetButton,
  },
  metaInfo () {
    return {
      title: `${this.$page.sitename} - Desktop App`,
    }
  },
};
</script>

