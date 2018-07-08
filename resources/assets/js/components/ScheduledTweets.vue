<template>
    <div>
        <ScheduledTweetsList
          :scheduled-tweets="scheduledTweets"
          @delete="deleteScheduledTweet"
        ></ScheduledTweetsList>
    </div>
</template>

<script>
    import api from '../api';
    import { sortBy } from 'lodash';
    import ScheduledTweetsList from './ScheduledTweetsList';

    export default {
        components: {
            ScheduledTweetsList,
        },

        data() {
            return {
                scheduledTweets: [],
            }
        },

        async created() {
            this.scheduledTweets = await api.getScheduledTweets();
        },

        methods: {
            async addScheduledTweet(attributes) {

            },

            deleteScheduledTweet(scheduledTweetId) {
                this.scheduledTweets = this.scheduledTweets.filter(scheduledTweet => scheduledTweet.id !== scheduledTweetId);

                api.deleteScheduledTweet(scheduledTweetId);
            },
        }
    }
</script>