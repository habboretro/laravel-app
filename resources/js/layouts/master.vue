<template>
  <main>
    <jet-header />
    <main class="-mt-24 mb-12">
      <section class="container mx-auto px-4 md:px-0">
        <slot />
      </section>
    </main>
    <jet-footer />
    <portal-target class="relative z-50 text-gray-900" name="modal" multiple />
  </main>
</template>

<script>
import JetHeader from '@/components/Header'
import JetFooter from '@/components/Footer'
export default {
  components: {
    JetHeader,
    JetFooter,
  },
}
</script>
