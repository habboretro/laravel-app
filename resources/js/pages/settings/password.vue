<template>
  <section>
    <jet-card class="p-4">
      <jet-success-message class="mb-4" />
      <jet-title-card class="mb-4">Update your password</jet-title-card>
      <form @submit.prevent="updatePassword">
        <fieldset class="mb-2">
          <jet-label for="current_password" value="Current Password" class="mb-1" />
          <jet-input id="current_password" v-model="formData.current_password" type="password" class="w-full mb-2" />
          <jet-input-error :message="errors.current_password" />
        </fieldset>
        <fieldset class="mb-2">
          <jet-label for="password" value="New Password" class="mb-1" />
          <jet-input id="password" v-model="formData.password" type="password" class="w-full mb-2" />
          <jet-input-error :message="errors.password" />
        </fieldset>
        <fieldset class="mb-2">
          <jet-label for="password_confirmation" value="Confirm Password" class="mb-1" />
          <jet-input id="password_confirmation" v-model="formData.password_confirmation" type="password" class="w-full mb-2" />
          <jet-input-error :message="errors.password_confirmation" />
        </fieldset>
        <fieldset class="flex">
          <jet-button :loading="loading" type="submit" class="ml-auto">Update Password</jet-button>
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
  },
  data () {
    return {
      loading: false,
      formData: {
        current_password: '',
        password: '',
        password_confirmation: '',
        _token: this.csrf_token,
      }
    }
  },
  methods: {
    async updatePassword() {
      this.loading = true
      await this.$inertia.put('/api/update-password', this.formData)
      this.formData.current_password = ''
      this.formData.password = ''
      this.formData.password_confirmation = ''
      this.loading = false
    }
  }
}
</script>
