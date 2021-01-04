<template>
  <section class="absolute left-0 top-0">
    <div class="flex items-center p-4">
      <jet-mystery-box-toggle @click="toggleVisiblity" />
    </div>
    <jet-mystery-box-base v-if="visible" @exit="toggleVisiblity" />
  </section>
</template>

<script>
import JetMysteryBoxToggle from './mystery-box/Toggle'
import JetMysteryBoxBase from './mystery-box/Base'
export default {
  components: {
    JetMysteryBoxToggle,
    JetMysteryBoxBase,
  },
  data () {
    return {
      visible: false,
    }
  },
  methods: {
    toggleVisiblity() {
      this.visible = !this.visible
    }
  }
}
</script>
