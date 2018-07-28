import store from './store';

window.Echo.private('tweets').listen('TweetTweeted', event => {
    store.commit('deleteTweet', event.tweetId);
});
