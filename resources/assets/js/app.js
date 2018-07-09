require('./bootstrap');

window.Vue = require('vue');
import PortalVue from "portal-vue";
import Vuex from 'vuex';

Vue.use(PortalVue);
Vue.use(Vuex);

Vue.component('scheduled-tweets', require('./components/ScheduledTweets.vue'));

const app = new Vue({
    el: '#app'
});
