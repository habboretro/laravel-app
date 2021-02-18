<template>
  <section>
    <div class="flex flex-wrap -mx-4">
      <div class="w-full px-4 mb-4 md:w-2/3">
        <jet-card class="p-6">
          <jet-card-title>
            <p class="font-bold text-xl">Login to {{ $page.shortname }}</p>
            <i class="fas fa-user ml-auto"></i>
          </jet-card-title>

          <form @submit.prevent="onLogin">
            <jet-label for="username" value="Username or Email" />
            <jet-input id="username" v-model="formData.mail" class="block mt-1 w-full mb-1" type="text" required autofocus />
            <jet-input-error :message="$page.errors.mail" class="mb-4" />
            <jet-label for="password" value="Password" />
            <jet-input id="password" v-model="formData.password" class="block mt-1 w-full mb-4" type="password" required />
            <inertia-link class="block underline text-sm text-gray-600 hover:text-gray-900 mb-4" href="/register">Don't have an account?</inertia-link>
            <jet-button>Login</jet-button>
          </form>
        </jet-card>
      </div>
      <div class="w-full px-4 mb-4 md:w-1/3">
        <iframe src="https://discord.com/widget?id=792793399841259531&theme=dark" width="100%" height="346" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts" />
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
        mail: null,
        password: null,
      },
    }
  },
  methods: {
    onLogin() {
      this.$inertia.post('/login', this.formData)
    }
  }
}
</script>

