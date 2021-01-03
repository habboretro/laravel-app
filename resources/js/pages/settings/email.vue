<template>
  <section>
    <jet-card class="p-4">
      <jet-success-message class="mb-4" />
      <jet-title-card class="mb-4">Update your email</jet-title-card>
      <form @submit.prevent="updateEmail">
        <fieldset class="mb-2">
          <jet-label for="email" value="Email Address" class="mb-1" />
          <jet-input id="email" v-model="formData.email" type="email" class="w-full mb-2" />
          <jet-input-error :message="errors.email" />
        </fieldset>
        <fieldset class="mb-2">
          <jet-label for="password" value="Current Password" class="mb-1" />
          <jet-input id="password" v-model="formData.current_password" type="password" class="w-full mb-2" />
          <jet-input-error :message="errors.current_password" />
        </fieldset>
        <fieldset class="flex">
          <jet-button :loading="loading" type="submit" class="ml-auto">Update Email Address</jet-button>
        </fieldset>
      </form>
    </jet-card>
  </section>
</template>

<script>
import Layout from "@/layouts/settings";
import JetInput from '@/components/Input';
import JetInputError from '@/components/InputError';
import JetLabel from '@/components/Label';
import JetButton from '@/components/Button';
import JetCard from '@/components/Card';
import JetTitleCard from '@/components/TitleCard';
import JetSuccessMessage from '@/components/SuccessMessage';
export default {
  layout: Layout,
  components: {
    JetCard,
    JetInput,
    JetInputError,
    JetLabel,
    JetButton,
    JetTitleCard,
    JetSuccessMessage,
  },
  props: {
    csrf_token: String,
    errors: Object,
    user: Object,
  },
  data () {
    return {
      loading: false,
      formData: {
        email: this.user.mail,
        current_password: '',
        _token: this.csrf_token,
      }
    }
  },
  methods: {
    async updateEmail() {
      this.loading = true
      await this.$inertia.put('/api/update-email', this.formData)
      this.formData.current_password = ''
      this.loading = false
    }
  },
  metaInfo () {
    return {
      title: `${this.$page.sitename} - Update your Email`,
    }
  },
}
</script>

