export default {
    getScheduledTweets() {
        return window.axios.get('api/scheduled-tweets')
    },

    createScheduledTweet(attributes) {
        return window.axios.post('api/scheduled-tweets', attributes)
    },

    deleteScheduledTweet(scheduledTweetId) {
        return window.axios.delete(`api/scheduled-tweets/${scheduledTweetId}`)
    },
}