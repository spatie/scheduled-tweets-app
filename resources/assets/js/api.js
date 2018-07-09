export default {
    async getScheduledTweets() {
        const response = await axios.get('api/scheduled-tweets');

        return response.data.data;
    },

    createScheduledTweet(attributes) {
        return axios.post('api/scheduled-tweets', attributes);
    },

    deleteScheduledTweet(scheduledTweetId) {
        return axios.delete(`api/scheduled-tweets/${scheduledTweetId}`);
    },
};
