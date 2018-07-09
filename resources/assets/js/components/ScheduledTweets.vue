<template>
    <div v-if="sortedScheduledTweets.length">

        <table>
            <tr>
                <th>Text</th>
                <th>Scheduled for</th>
                <th>Sent at</th>
                <th></th>
            </tr>
            <tr v-for="scheduledTweet in sortedScheduledTweets">
                <td>{{ scheduledTweet.text }}</td>
                <td>{{ scheduledTweet.scheduledFor }}</td>
                <td>{{ scheduledTweet.sentAt }}</td>
                <td><DeleteTweetButton
                  :scheduledTweet="scheduledTweet"
                ></DeleteTweetButton></td>
            </tr>
        </table>
    </div>
    <div v-else>
        No tweets scheduled yet
    </div>
</template>

<script>
import { sortBy } from 'lodash';
import DeleteTweetButton from './DeleteTweetButton';
import store from '../store';

export default {
    components: {
        DeleteTweetButton,
    },

    created() {
        store.dispatch('loadScheduledTweets');
    },

    computed: {
        sortedScheduledTweets() {
            return sortBy(store.state.scheduledTweets, 'scheduledFor').reverse();
        },
    },
};
</script>
