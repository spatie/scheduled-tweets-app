<template>
    <div>
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
                <td><button @click="deleteScheduledTweet(scheduledTweet)">Delete</button></td>
            </tr>
        </table>

    </div>
</template>

<script>
    import api from '../api';
    import { sortBy } from 'lodash';

    export default {
        computed: {
            sortedScheduledTweets() {
                return sortBy(this.scheduledTweets, 'scheduledFor').reverse();
            }
        },

        data() {
            return {
                scheduledTweets: []
            }
        },

        async created() {
            const response = await api.getScheduledTweets();

            this.scheduledTweets = response.data.data;
        },

        methods: {
            deleteScheduledTweet(scheduledTweet) {
                const toBeDeletedId = scheduledTweet.id

                this.scheduledTweets = this.scheduledTweets.filter(scheduledTweet => scheduledTweet.id !== toBeDeletedId);

                api.deleteScheduledTweet(toBeDeletedId);
            }
        }


    }
</script>