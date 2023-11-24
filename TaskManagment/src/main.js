import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap/dist/js/bootstrap'
import '@popperjs/core'
import router from "@/routers/index";
import '@fortawesome/fontawesome-free/css/all.css'

createApp(App).use(router).mount('#app')
