import Echo from 'laravel-echo';
import store from './store';

window.Echo.channel('tweets')
    .listen('TweetTweeted', event => store.updateTweet(event.tweet));