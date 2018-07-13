<template>
    <div>
        <AddTweetForm :accounts="accounts"></AddTweetForm>

        <div v-if="sortedTweets.length">
            <div class="mt-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="row-text">Text</th>
                        <th class="row-scheduled-at">Scheduled for</th>
                        <th class="row-tweeted-at">Tweeted at</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="tweet in sortedTweets">
                        <td>{{ tweet.text }}</td>
                        <td>{{ tweet.scheduledFor }}</td>
                        <td>{{ tweet.tweetedAt }}</td>
                        <td>
                            <DeleteTweetButton
                              :tweet="tweet"
                            ></DeleteTweetButton>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
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
        store.dispatch('loadTweets');
    },

    computed: {
        sortedTweets() {
            return sortBy(store.state.tweets, 'scheduledFor').reverse();
        },
    },
};
</script>
