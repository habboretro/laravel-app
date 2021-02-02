<template>
  <section class="flex flex-wrap items-start -mx-4">
    <div class="w-full px-4">
      <jet-success-message class="w-full mb-4" />
      <jet-error-message class="w-full mb-4" />
    </div>
    <h2 class="text-center text-white text-4xl capitalize w-full px-4 mb-4 md:text-left">Recommended Products</h2>
    <div class="w-full md:flex-1 px-4 mb-4">
      <div class="mb-4">
        <div class="flex flex-wrap items-start -mx-4">
          <template v-for="(product, index) in recommended.data">
            <div v-if="canShowProduct(product)" :key="index" class="w-full md:w-1/2 px-4 mb-4">
              <jet-card class="p-4">
                <div class="uppercase font-bold table text-xs text-white bg-teal-500 px-2 py-1 rounded-full mb-4">{{ product.category }}</div>
                <p class="flex items-center text-xl font-bold">
                  <span v-if="!['vip', 'diamond_vip'].includes(product.type)" class="mr-1">{{ product.reward }}</span>
                  <span class="mr-2">{{ getType(product.type) }}</span>
                  <span v-if="product.previous_reward" class="uppercase font-bold inline text-xs text-white bg-red-600 px-2 py-px rounded-full line-through ml-auto">{{ product.previous_reward }} {{ getType(product.type) }}</span>
                </p>

                <p class="text-lg mb-2">
                  <span>£{{ product.price }}</span>
                  <span v-if="product.previous_price" class="font-light text-sm text-red-600 line-through">£{{ product.previous_price }}</span>
                </p>
                <p class="text-gray-600 mb-2" v-html="product.description" />
                <jet-button :loading="loading" :disabled="loading" class="w-full justify-center" @click="purchaseItem(product.id)">Purchase</jet-button>
              </jet-card>
            </div>
          </template>
        </div>
      </div>
    </div>
    <div class="w-full px-4 mb-4 md:w-1/3">
      <jet-card class="p-4">
        <div class="flex items-center px-4 py-2 bg-yellow-200 text-yellow-500 rounded-lg mb-4">
          <i class="fas fa-piggy-bank text-5xl mr-4" />
          <p>You have <strong class="font-bold">£{{ me.data.balance }}</strong> account balance.</p>
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
    <div class="w-full px-4 mb-4">
      <template v-for="(productList, index) in products">
        <div v-if="canShowList(productList)" :key="index" class="w-full mb-4">
          <h2 class="text-center text-4xl capitalize mb-4 md:text-left">{{ productList[0].category }}</h2>
          <div class="flex flex-wrap items-start -mx-4">
            <template v-for="(product, key) in productList">
              <div v-if="canShowProduct(product)" :key="key" class="w-full md:w-1/3 px-4 mb-4">
                <jet-card class="p-4">
                  <div class="uppercase font-bold table text-xs text-white bg-teal-500 px-2 py-1 rounded-full mb-4">{{ product.category }}</div>
                  <p class="flex items-center text-xl font-bold">
                    <span v-if="!['vip', 'diamond_vip'].includes(product.type)" class="mr-1">{{ product.reward }}</span>
                    <span class="mr-2">{{ getType(product.type) }}</span>
                    <span v-if="product.previous_reward" class="uppercase font-bold inline text-xs text-white bg-red-600 px-2 py-px rounded-full line-through ml-auto">{{ product.previous_reward }} {{ getType(product.type) }}</span>
                  </p>

                  <p class="text-lg mb-4">
                    <span>£{{ product.price }}</span>
                    <span v-if="product.previous_price" class="font-light text-sm text-red-600 line-through">£{{ product.previous_price }}</span>
                  </p>
                  <p class="text-gray-500 mb-4" v-html="product.description" />
                  <jet-button :loading="loading" :disabled="loading" class="w-full justify-center" @click="purchaseItem(product.id)">Purchase</jet-button>
                </jet-card>
              </div>
            </template>
          </div>
        </div>
      </template>
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
    recommended: Object,
    products: Object,
    me: Object
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
      types: {
        vip: 'VIP',
        diamond_vip: 'Diamond VIP',
        0: 'Duckets',
        4: 'Tokens',
        5: 'Diamonds',
      },
    }
  },
  methods: {
    canShowList (products) {
      if (products[0].category === 'membership' && products.every(product => this.me.data.rank >= product.reward)) return false
      return true
    },
    canShowProduct(product) {
      if (product.category === 'membership' && this.me.data.rank >= product.reward) return false
      return true
    },
    getType(typeId) {
      return this.types[typeId] || 'Unknown Product'
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

