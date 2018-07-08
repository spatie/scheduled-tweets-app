require('./bootstrap');

window.Vue = require('vue');

Vue.component('scheduled-tweets', require('./components/ScheduledTweets.vue'));

const app = new Vue({
    el: '#app'
});
