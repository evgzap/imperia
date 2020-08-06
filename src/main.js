import Vue from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import store from './store'
import axios from 'axios'
import VueAxios from 'vue-axios'
import Tawk from 'vue-tawk'
import VueYandexMetrika from 'vue-yandex-metrika' 

import "@/assets/style.scss"
import "@/assets/fa/scss/font-awesome.scss"
import "@/assets/fonts/fonts.scss"

Vue.use(VueAxios, axios)
Vue.use(Tawk, {
  tawkSrc: "https://embed.tawk.to/5e70b66feec7650c332087e4/default"
})

Vue.use(VueYandexMetrika, {
  id: 66100117,
  router: router,
  env: process.env.NODE_ENV
})

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#wrapper')
