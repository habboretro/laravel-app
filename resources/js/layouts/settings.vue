<template>
  <main>
    <div class="py-12 container mx-auto px-4 md:px-0">
      <section class="flex flex-wrap -mx-4">
        <div class="w-full md:w-1/3 px-4 mb-4">
          <jet-card class="p-4">
            <jet-title-card icon="fas fa-cogs" class="mb-4">Account Settings</jet-title-card>
            <inertia-link href="/settings/email" class="block px-4 py-2 rounded-lg mb-2 hover:bg-green-400 hover:text-white transition duration-150 ease-in-out" no-scroll>Email Address</inertia-link>
            <inertia-link href="/settings/password" class="block px-4 py-2 rounded-lg mb-2 hover:bg-green-400 hover:text-white transition duration-150 ease-in-out" no-scroll>Password</inertia-link>
          </jet-card>
        </div>
        <div class="w-full md:flex-1 px-4 mb-4">
          <slot />
        </div>
      </section>
    </div>
    <portal-target class="relative z-50 text-gray-900" name="modal" multiple />
  </main>
</template>

<script>
import JetCard from '@/components/Card';
import JetTitleCard from '@/components/TitleCard';
export default {
  components: {
    JetCard,
    JetTitleCard,
  }
}
</script>
