require('./bootstrap');

window.Vue = require('vue');
import PortalVue from 'portal-vue';
import Vuex from 'vuex';

Vue.use(PortalVue);
Vue.use(Vuex);

Vue.component('tweet-list', require('./components/TweetList.vue'));

const app = new Vue({
    el: '#app',
});

require('./echo');
