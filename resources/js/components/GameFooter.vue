<template>
  <div class="absolute bottom-0 left-0 right-0 flex items-end p-4 z-10 pointer-events-none">
    <div class="flex items-end mr-8">
      <div class="mr-2">
        <jet-game-button class="mb-2 translate-x-2" size="sm" icon="fas fa-users" @click="$emit('friends')" />
        <jet-game-button size="sm" icon="fas fa-comment-alt" @click="$emit('chat')" />
      </div>
      <div class="mr-2">
        <jet-game-button class="mb-2 mx-auto" size="sm" icon="fas fa-hand-paper" @click="$emit('inventory')"  />
        <jet-game-button borderColor="indigo-500" backgroundColor="indigo-600" @click="$emit('hotelView')">
          <img src="/images/logo-p.svg" alt="hotel view" class="h-8 mx-auto" />
        </jet-game-button>
      </div>
      <div>
        <jet-game-button class="mb-2 -ml-2" size="sm" icon="fas fa-tshirt" @click="$emit('avatarEditor')" />
        <jet-game-button size="sm" icon="fas fa-camera" @click="$emit('camera')" />
      </div>
    </div>
    <div class="flex items-end mr-2">
      <jet-game-button class="mr-4" borderColor="purple-400" backgroundColor="purple-500" icon="fas fa-shopping-cart" @click="$emit('catalog')" />
      <jet-game-button borderColor="purple-700" backgroundColor="purple-800" icon="fas fa-globe-americas" @click="$emit('navigator')" />
    </div>
    <div class="flex items-end ml-auto">
      <jet-game-button class="mr-4" borderColor="red-600" backgroundColor="red-700" icon="fas fa-expand" @click="$emit('fullscreen')" />
      <jet-game-button class="mr-4" borderColor="red-600" backgroundColor="red-700" icon="fas fa-question" @click="$emit('information')" />
      <jet-game-button borderColor="red-600" backgroundColor="red-700" icon="fas fa-sign-in-alt" @click="$emit('logout')" />
    </div>
  </div>
</template>

<script>
import JetGameButton from './GameButton'
export default {
  components: {
    JetGameButton,
  }
}
</script>

