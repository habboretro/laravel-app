<template>
  <section class="flex flex-wrap items-start -mx-4">
    <div class="w-full px-4">
      <jet-success-message class="w-full mb-4" />
      <jet-error-message class="w-full mb-4" />
    </div>
    <div class="w-full md:flex-1 px-4 mb-4">
      <jet-title-card v-if="$page.user.rank < 3" icon="fas fa-coins" class="mb-4">VIP</jet-title-card>
      <div v-if="$page.user.rank < 3" class="flex flex-wrap items-start -mx-4">
        <template v-for="(vip, index) in vips">
          <div v-if="$page.user.rank < vip.rank" :key="index" class="relative w-full md:w-1/3 px-4 mb-4">
            <jet-card class="p-4">
              <jet-dropdown>
                <div slot="trigger" class="absolute right-0 top-0 w-6 h-6 bg-green-400 rounded-lg flex items-center justify-center text-white hover:bg-green-500 cursor-pointer">
                  <i class="text-sm fas fa-info" />
                </div>
                <div slot="content">
                  <jet-dropdown-link v-for="(item, index) of vip.items" :key="index">{{ item }}</jet-dropdown-link>
                </div>
              </jet-dropdown>
              <p class="text-center text-3xl font-bold">{{ vip.name }}</p>
              <p class="text-sm text-gray-600 text-center mb-4">VIP</p>
              <jet-button :loading="loading" :disabled="loading" class="w-full justify-center" @click="purchaseVip(vip.type)">Purchase (£{{ vip.price }})</jet-button>
            </jet-card>
          </div>
        </template>
      </div>
      <jet-title-card icon="fas fa-coins" class="mb-4">Currency</jet-title-card>
      <div class="flex flex-wrap items-start -mx-4">
        <div v-for="(product, index) in products.data" :key="index" class="w-full md:w-1/3 px-4 mb-4">
          <jet-card class="p-4">
            <p class="text-center text-3xl font-bold">{{ product.reward }}</p>
            <p class="text-sm text-gray-600 text-center mb-4">{{ getType(product.type) }}</p>
            <jet-button :loading="loading" :disabled="loading" class="w-full justify-center" @click="purchaseItem(product.id)">Purchase (£{{ product.price }})</jet-button>
          </jet-card>
        </div>
      </div>
    </div>
    </div>
    <div class="w-full px-4 md:w-1/3">
      <jet-title-card icon="fas fa-piggy-bank" class="mb-4">Add Credit</jet-title-card>
      <jet-card class="p-4">
        <div class="flex items-center px-4 py-2 bg-yellow-200 text-yellow-500 rounded-lg mb-4">
          <i class="fas fa-piggy-bank text-5xl mr-4" />
          <p>You have <strong class="font-bold">£{{ user.balance }}</strong> account balance.</p>
        </div>
        <form @submit.prevent="updateBalance">
          <fieldset class="mb-4">
            <jet-label for="amount" value="Amount" class="mb-1" />
            <select id="amount" v-model="amount" class="w-full px-4 py-2 border rounded">
              <option :value="null" disabled>Please select an amount to top-up!</option>
              <option v-for="(option, index) in options" :key="index" :value="option">£{{ option }}</option>
            </select>
          </fieldset>
          <fieldset class="flex">
            <jet-button :loading="loading" :disabled="amount === null" type="submit" class="w-full justify-center">Pay with PayPal</jet-button>
          </fieldset>
        </form>
      </jet-card>
    </div>
  </section>
</template>

<script>
import Layout from "@/layouts/master";
import JetTitleCard from "@/components/TitleCard";
import JetCard from "@/components/Card";
import JetLabel from "@/components/Label";
import JetButton from "@/components/Button";
import JetSuccessMessage from "@/components/SuccessMessage";
import JetErrorMessage from "@/components/ErrorMessage";
import JetDropdown from '@/components/Dropdown';
import JetDropdownLink from '@/components/DropdownLink';
export default {
  layout: Layout,
  components: {
    JetTitleCard,
    JetCard,
    JetLabel,
    JetButton,
    JetSuccessMessage,
    JetErrorMessage,
    JetDropdown,
    JetDropdownLink,
  },
  props: {
    products: Object,
    user: Object
  },
  metaInfo () {
    return {
      title: `${this.$page.sitename} - Store`,
    }
  },
  data() {
    return {
      loading: false,
      options: [3, 5, 7, 11, 12, 15, 20, 25],
      amount: null,
      vips: [
        {
          name: 'Standards',
          type: 'standard',
          price: 7.00,
          rank: 2,
          items: [
            '8 Diamonds every 10 minutes',
            '2500 Credits every 10 minutes',
            '2500 Duckets every 10 minutes',
            'VIP Rares in catalog',
            'More commands',
          ]
        },
        {
          name: 'Diamond',
          type: 'diamond',
          price: 12,
          rank: 3,
          items: [
            'Everything in Standard VIP',
            '12 Diamonds every 10 minutes',
            '5000 Credits every 10 minutes',
            '5000 Duckets every 10 minutes',
            'Diamond VIP Rares in catalog',
            'Even More Commands',
          ]
        }
      ],
      types: {
        0: 'Duckets',
        5: 'Diamonds',
      },
    }
  },
  methods: {
    getType(typeId) {
      return this.types[typeId] || 'Unknown'
    },
    async purchaseVip(type) {
      this.loading = true
      await this.$inertia.post(`/api/purchase/vip/${type}`)
      this.loading = false
    },
    async purchaseItem (itemId) {
      this.loading = true
      await this.$inertia.post(`/api/purchase/${itemId}`)
      this.loading = false
    },
    updateBalance() {
      window.location.href = `/paypal/checkout/${this.amount}`
    }
  }
};
</script>

