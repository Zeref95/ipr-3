require('./bootstrap');

import { createApp } from 'vue'
import App from './App.vue'

createApp({
  components: {'app': App},
}).mount('#app')