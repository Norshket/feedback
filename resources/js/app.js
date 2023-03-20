require('./bootstrap');

window.Vue = require('vue');

import App from './components/App';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import './plugins'

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)


const app = new Vue({
    el: '#app',
    ...App,
});


