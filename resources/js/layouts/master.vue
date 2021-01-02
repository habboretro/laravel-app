<template>
  <main>
    <div class="py-12 container mx-auto px-4 md:px-0">
      <slot />
    </div>
    <portal-target class="relative z-50 text-gray-900" name="modal" multiple />
  </main>
</template>
