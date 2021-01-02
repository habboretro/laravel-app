<template>
  <section class="flex flex-wrap items-start -mx-4">
    <div class="w-full px-4">
      <jet-success-message class="w-full mb-4" />
      <jet-error-message class="w-full mb-4" />
    </div>
    <div class="w-full md:flex-1 px-4 mb-4">
      <jet-title-card icon="fas fa-coins" class="mb-4">Currency</jet-title-card>
      <div class="flex flex-wrap items-start -mx-4">
        <div v-for="(product, index) in products" :key="index" class="w-full md:w-1/3 px-4 mb-4">
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
export default {
  layout: Layout,
  components: {
    JetTitleCard,
    JetCard,
    JetLabel,
    JetButton,
    JetSuccessMessage,
    JetErrorMessage,
  },
  props: {
    products: Array,
    user: Object
  },
  data() {
    return {
      loading: false,
      options: [3, 5, 7, 11, 12, 15, 20, 25],
      amount: null,
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

