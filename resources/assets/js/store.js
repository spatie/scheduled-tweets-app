import Vuex from 'vuex';
import api from './api';

export default new Vuex.Store({
    state: {
        tweets: [],
    },

    mutations: {
        loadTweets(state, tweets) {
            state.tweets = tweets;
        },

        addTweet(state, tweet) {
            state.tweets.push(tweet);
        },

        deleteTweet(state, deletedTweet) {
            state.tweets = state.tweets.filter(tweet => tweet.id !== deletedTweet.id);
        },
    },

    actions: {
        async loadTweets({ commit }) {
            const tweets = await api.getScheduledTweets();

            commit('loadTweets', tweets);
        },

        deleteTweet({ commit }, tweet) {
            api.deleteTweet(tweet.id);

            commit('deleteTweet', tweet);
        },
    },
});
