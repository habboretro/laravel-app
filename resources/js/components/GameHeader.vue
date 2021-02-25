<template>
  <div class="absolute top-0 left-0 right-0 flex items-center p-4 z-10 pointer-events-none">
    <div class="w-1/4">
      <jet-dropdown align="left" class="relative z-50 w-32 pointer-events-auto">
        <div slot="trigger">
          <jet-game-button class="text-sm" size="xs" borderSize="2" borderColor="white" backgroundColor="transparent" icon="fas fa-bars" />
        </div>
        <div slot="content">
          <jet-dropdown-link href="/me">
            <i class="fas fa-home mr-2" />
            <span>Home</span>
          </jet-dropdown-link>
          <jet-dropdown-link as="button" @click="$emit('helperTool')">
            <i class="fas fa-life-ring mr-2" />
            <span>Helper Tools</span>
          </jet-dropdown-link>
          <jet-dropdown-link as="button" @click="$emit('talentTracker')">
            <i class="fas fa-heart mr-2" />
            <span>Talent Tracker</span>
          </jet-dropdown-link>
          <jet-dropdown-link as="button" @click="$emit('achievements')">
            <i class="fas fa-trophy mr-2" />
            <span>Achievements</span>
          </jet-dropdown-link>
          <jet-dropdown-link as="button" @click="$emit('myProfile')">
            <i class="fas fa-user-circle mr-2" />
            <span>My Profile</span>
          </jet-dropdown-link>
          <jet-dropdown-link as="button" @click="$emit('myRooms')">
            <i class="fas fa-key mr-2" />
            <span>My Rooms</span>
          </jet-dropdown-link>
          <jet-dropdown-link as="button" @click="$emit('mysertBox')">
            <i class="fas fa-parachute-box mr-2" />
            <span>Mystery Box</span>
          </jet-dropdown-link>
          <jet-dropdown-link as="button" @click="$emit('forum')">
            <i class="fas fa-window-maximize mr-2" />
            <span>Forums</span>
          </jet-dropdown-link>
        </div>
      </jet-dropdown>
    </div>
    <div class="w-3/4 flex justify-center md:w-1/2">
      <div class="bg-gray-800 text-white px-2 py-1 rounded-full text-sm mr-4 flex items-center justify-center">
        <div v-for="(currency, index) in currencies" :key="index" class="flex items-center justify-center mx-2">
          <img :src="`/images/icons/${currency.icon}`" :alt="currency.type" class="block h-4 mr-2" />
          <p class="text-blue-100">{{ currency.amount | currencyFormat }}</p>
        </div>
      </div>
      <div class="bg-gray-800 text-white px-2 py-1 rounded-full text-sm mr-4 flex items-center justify-center">
        <div v-for="(membership, index) in memberships" :key="index" class="flex items-center justify-center mx-3">
          <img :src="`/images/icons/${membership.icon}`" :alt="membership.type" class="block h-4 mr-2" />
          <p class="text-blue-100">{{ membership.end_date | lengthFormat }}</p>
        </div>
      </div>
    </div>
    <div class="md:w-1/4" />
  </div>
</template>

<script>
import moment from 'moment'
import JetGameButton from './GameButton'
import JetDropdown from './Dropdown'
import JetDropdownLink from './DropdownLink'
export default {
  components: {
    JetGameButton,
    JetDropdown,
    JetDropdownLink,
  },
  props: {
    memberships: {
      type: Array,
      required: true,
    },
    currencies: {
      type: Array,
      required: true,
    },
  },
  filters: {
    currencyFormat(value) {
      return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    },
    lengthFormat (value) {
      const daysLeft = value.diff(moment().startOf(), 'days', false)
      if (daysLeft >= 365) return `${value.diff(moment().startOf(), 'years', false)} Y`
      if (daysLeft >= 28) return `${value.diff(moment().startOf(), 'months', false)} M`
      if (daysLeft === 0) return 'Inactive'
      return `${daysLeft} D`
    },
  },
}
</script>

