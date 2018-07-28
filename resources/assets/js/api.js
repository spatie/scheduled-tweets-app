export default {
    async getScheduledTweets() {
        const response = await axios.get('api/tweets?filter[not_tweeted_yet]');

        return response.data.data;
    },

    createScheduledTweet(attributes) {
        return axios.post('api/tweets', attributes);
    },

    deleteTweet(scheduledTweetId) {
        return axios.delete(`api/tweets/${scheduledTweetId}`);
    },
};
