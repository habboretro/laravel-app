export default {
  data () {
    return {
      loading: false,
      validationErrors: {},
      errorBags: this.$page.errorBags || {},
      formData: {},
    }
  },
  methods: {
    setLoading (value = true) {
      this.loading = value
    },

    resetLoading () {
      this.setLoading(false)
    },

    resetFormData () {
      this.formData = {}
    },

    resetValidationErrors() {
      this.validationErrors = {}
    },

    setValidationErrors({ response: { data: { errors } } }) {
      this.validationErrors = errors
      this.resetLoading()
    },

    hasErrors(bag) {
      return this.$page.errorBags[bag] && Object.keys(this.$page.errorBags[bag]).length > 0;
    },

    errorFor(key, bag = 'default') {
      if (!this.hasErrors(bag) || !this.$page.errorBags[bag][key] || this.$page.errorBags[bag][key].length == 0) {
        return;
      }

      return this.$page.errorBags[bag][key][0];
    },
  },
};
