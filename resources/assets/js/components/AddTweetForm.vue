<template>
    <div>
        <div class="flex max-w-lg">
            <textarea class="form-input tweet-box" rows="4" cols="65" placeholder="What's happening?" id="text"
                      name="text" type="text" v-model="form.text"/>
            <div class="col"></div>
        </div>
        <div class="flex max-w-lg justify-end">
            {{ this.charactersLeft }}
        </div>

        <div class="flex mt-2 validation-error"
          v-if="form.errors.has('text')"
          v-text="form.errors.get('text')[0]">
        </div>

        <div class="flex mt-4 max-w-lg">
            <div class="mr-4">
                <label class="form-label-aside" for="account">Account</label>
                <select
                  id="account"
                  v-model="form.account"
                  class="form-input h-full">
                    <option v-for="account in accounts">
                        {{ account }}
                    </option>
                </select>
            </div>

            <div class="mr-4">
                <label class="form-label-aside" for="scheduledFor">Scheduled for</label>
                <input class="form-input" placeholder="YYYY-MM-DD hh:mm:ss" id="scheduledFor" name="scheduledFor"
                       type="text" v-model="form.scheduledFor">

                <div class="mt-2 validation-error"
                  v-if="form.errors.has('scheduledFor')"
                  v-text="form.errors.get('scheduledFor')[0]">
                </div>
            </div>

            <div class="flex-1"></div>
                <div>
                    <button
                      type="button"
                      class="btn btn-blue"
                      @click="createScheduledTweet"
                    >
                        Create scheduled tweet
                    </button>
                </div>
        </div>
    </div>
</template>

<script>
import store from '../store';
import Form from 'form-backend-validation';
import moment from 'moment';

export default {
    props: ['accounts'],

    computed: {
        charactersLeft() {
            return 280 - this.form.text.length;
        },
    },

    data() {
        return {
            form: new Form({
                account: this.accounts[0],
                text: '',
                scheduledFor: moment()
                    .add(1, 'days')
                    .format('YYYY-MM-DD HH:mm:ss'),
            }),
        };
    },
    methods: {
        cancel() {
            this.$emit('close');
        },
        async createScheduledTweet() {
            const response = await this.form.post('/api/tweets');

            store.commit('addTweet', response.data);

            this.$flashNow('Tweet added!');
        },
    },
};
</script>
