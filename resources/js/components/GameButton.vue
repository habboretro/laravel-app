<template>
  <button :class="classes" @click="$emit('click')">
    <i v-if="icon" :class="icon" />
    <slot v-else />
  </button>
</template>

<script>
export default {
  props: {
    size: {
      type: String,
      default: 'md',
    },
    borderSize: {
      type: String,
      default: "4",
    },
    borderColor: {
      type: String,
      default: 'blue-400',
    },
    backgroundColor: {
      type: String,
      default: 'blue-500',
    },
    icon: {
      type: String | null,
      default: null
    },
  },
  computed: {
    classes () {
      return {
        'block': true,
        [`border-${this.borderSize}`]: true,
        [`border-${this.borderColor}`]: true,
        [`bg-${this.backgroundColor}`]: true,
        'text-white': true,
        'shadow-xl': true,
        'rounded-full': true,
        'w-20': this.size === 'xl',
        'h-20': this.size === 'xl',
        'text-2xl': this.size === 'xl',
        'w-16': this.size === 'lg',
        'h-16': this.size === 'lg',
        'text-xl': ['md', 'lg'].includes(this.size),
        'w-14': this.size === 'md',
        'h-14': this.size === 'md',
        'w-10': this.size === 'sm',
        'h-10': this.size === 'sm',
        'w-8': this.size === 'xs',
        'h-8': this.size === 'xs',
        'transform': true,
        'focus:outline-none': true,
        'hover:scale-125': true,
        'pointer-events-auto': true,
        'transition': true,
        'duration-300': true,
        'ease-in-out': true,
      }
    },
  },
}
</script>
