import Vuex from 'vuex';
import api from './api';

export default new Vuex.Store({
    state: {
        scheduledTweets: [],
    },

    mutations: {
        loadScheduledTweets(state, scheduledTweets) {
            state.scheduledTweets = scheduledTweets;
        },

        deleteScheduledTweet(state, deletedScheduledTweet) {
            state.scheduledTweets = state.scheduledTweets.filter(scheduledTweet => scheduledTweet.id !== deletedScheduledTweet.id);
        }
    },

    actions: {
        async loadScheduledTweets({ commit }) {
            const scheduledTweets = await api.getScheduledTweets();

            commit('loadScheduledTweets', scheduledTweets);
        },

        deleteScheduledTweet({ commit }, scheduledTweet) {
            api.deleteScheduledTweet(scheduledTweet.id)

            commit('deleteScheduledTweet', scheduledTweet)
        }
    }
});