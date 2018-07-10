<template>
    <div>
        <AddTweetForm :accounts="accounts"></AddTweetForm>

        <div v-if="sortedScheduledTweets.length">

            <table class="table">
                <thead>
                <tr>
                    <th class="row-text">Text</th>
                    <th class="row-scheduled-at">Scheduled for</th>
                    <th class="row-sent-at">Sent at</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="scheduledTweet in sortedScheduledTweets">
                    <td>{{ scheduledTweet.text }}</td>
                    <td>{{ scheduledTweet.scheduledFor }}</td>
                    <td>{{ scheduledTweet.sentAt }}</td>
                    <td>
                        <DeleteTweetButton
                          :scheduledTweet="scheduledTweet"
                        ></DeleteTweetButton>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div v-else>
            No tweets scheduled yet
        </div>
    </div>
</template>

<script>
import { sortBy } from 'lodash';
import AddTweetForm from './AddTweetForm';
import DeleteTweetButton from './DeleteTweetButton';
import store from '../store';

export default {
    components: {
        AddTweetForm,
        DeleteTweetButton,
    },

    props: ['accounts'],

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
