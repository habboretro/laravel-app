<template>
  <section>
    <div class="flex flex-wrap -mx-4">
      <div class="w-full px-4 mb-4 md:w-2/3">
        <jet-card class="p-6">
          <jet-card-title>
            <p class="font-bold text-xl">Register to {{ $page.shortname }}</p>
            <i class="fas fa-user ml-auto"></i>
          </jet-card-title>
          <form @submit.prevent="onRegister">
            <div class="flex items-center justify-between -mx-4">
              <fieldset class='w-full md:w-1/2 px-4 mb-4'>
                <jet-label for="username" value="Username" />
                <jet-input v-model="formData.username" id="username" class="block mt-1 w-full mb-1" type="text" required autofocus autocomplete="username" />
                <jet-input-error :message="$page.errors.username" />
              </fieldset>
              <fieldset class='w-full md:w-1/2 px-4 mb-4'>
                <jet-label for="email" value="Email" />
                <jet-input v-model="formData.email" id="email" class="block mt-1 w-full mb-1" type="email" required />
                <jet-input-error :message="$page.errors.email" />
              </fieldset>
            </div>
            <div class="flex items-center justify-between -mx-4">
              <fieldset class='w-full md:w-1/2 px-4 mb-4'>
                <jet-label for="password" value="Password" />
                <jet-input v-model="formData.password" id="password" class="block mt-1 w-full mb-1" type="password" required autocomplete="new-password" />
                <jet-input-error :message="$page.errors.password" />
              </fieldset>
              <fieldset class='w-full md:w-1/2 px-4 mb-4'>
                <jet-label for="password_confirmation" value="Confirm Password" />
                <jet-input v-model="formData.password_confirmation" id="password_confirmation" class="block mt-1 w-full mb-1" type="password" required autocomplete="new-password" />
                <jet-input-error :message="$page.errors.password_confirmation" />
              </fieldset>
            </div>
            <inertia-link class="block underline text-sm text-gray-600 hover:text-gray-900 mb-4" href="/login">Already registered?</inertia-link>
            <jet-button>Register</jet-button>
          </form>
        </jet-card>
      </div>
      <div class="w-full px-4 mb-4 md:w-1/3">
        <iframe src="https://discord.com/widget?id=792793399841259531&theme=dark" width="100%" height="366" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts" />
      </div>
    </div>
    <jet-news-articles :items="$page.articles" :perLine="3" hideMore hideTitle />
  </section>
</template>

<script>
import Layout from "@/layouts/master"
import JetCard from "@/components/Card"
import JetInput from "@/components/Input"
import JetLabel from "@/components/Label"
import JetButton from "@/components/Button"
import JetCardTitle from "@/components/CardTitle"
import JetNewsArticles from "@/components/NewsArticles"
import JetInputError from "@/components/InputError"
export default {
  layout: Layout,
  metaInfo () {
    return {
      title: this.$page.sitename,
    }
  },
  components: {
    JetCard,
    JetInput,
    JetLabel,
    JetButton,
    JetCardTitle,
    JetNewsArticles,
    JetInputError,
  },
  data () {
    return {
      formData: {
        username: null,
        email: null,
        password: null,
        password_confirmation: null,
        referral_code: this.$page.referral_code,
      },
    }
  },
  methods: {
    onRegister() {
      this.$inertia.post('/register', this.formData)
    }
  }
}
</script>

