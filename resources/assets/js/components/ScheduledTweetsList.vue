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
                <td><button @click="$emit('delete', scheduledTweet.id)">Delete</button></td>
            </tr>
        </table>

    </div>
</template>

<script>
    import { sortBy } from 'lodash';

    export default {
        computed: {
            sortedScheduledTweets() {
                return sortBy(this.scheduledTweets, 'scheduledFor').reverse();
            }
        },

        props: ['scheduledTweets'],
    }
</script>