<template>
  <div class="block flex-shrink-0">
    <inertia-link :href="$page.me ? '/me' : '/'">
      <img
        :src="`https://habbofont.net/font/habbnew/${$page.shortname}.gif`"
        :alt="$page.shortname"
        class="block"
      />
    </inertia-link>
  </div>
</template>

