import Vuex from 'vuex';
import api from './api';
import { remove } from 'lodash';

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

        deleteTweet(state, tweetId) {
            state.tweets = state.tweets.filter(tweet => tweet.id !== tweetId);
        },
    },

    actions: {
        async loadTweets({ commit }) {
            const tweets = await api.getScheduledTweets();

            commit('loadTweets', tweets);
        },

        deleteTweet({ commit }, tweetId) {
            api.deleteTweet(tweetId);

            commit('deleteTweet', tweetId);
        },
    },
});
