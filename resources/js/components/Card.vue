<template>
  <div class="rounded-lg bg-white shadow" @click="$emit('click')">
    <slot />
  </div>
</template>
