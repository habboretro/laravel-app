import 'proxy-polyfill/proxy.min.js'
import 'core-js/stable'
import 'whatwg-fetch'
import 'first-input-delay'

import Vue from 'vue'
import axios from 'axios'
import VueMeta from 'vue-meta'
import PortalVue from 'portal-vue'
import { InertiaApp } from '@inertiajs/inertia-vue'

Vue.config.productionTip = false

Vue.mixin({
  mounted () {
    this.$axios = axios.create()
    this.$route = window.route
  }
})
Vue.use(InertiaApp)
Vue.use(PortalVue)
Vue.use(VueMeta)

new Vue({
  metaInfo: {
    titleTemplate: (title) => title ? `${title}` : '',
    meta: [],
  },
  render: h => h(InertiaApp, {
    props: {
      initialPage: JSON.parse(app.dataset.page),
      resolveComponent: name => import(`@/pages/${name}.vue`).then(module => module.default),
    },
  }),
}).$mount(app);
