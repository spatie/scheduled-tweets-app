require('./bootstrap');

window.Vue = require('vue');
import PortalVue from 'portal-vue';
import Vuex from 'vuex';

Vue.mixin(require('./mixins/Ui.js').default);
Vue.use(PortalVue);
Vue.use(Vuex);

Vue.component('tweet-list', require('./components/TweetList.vue'));
Vue.component('flash', require('./components/Flash'));

const app = new Vue({
    el: '#app',
});

require('./echo');
