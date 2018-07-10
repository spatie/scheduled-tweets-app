<template>
    <div>

        <div class="mb-4">
            <label class="form-label" for="text">Text</label>
            <textarea class="form-input tweet-box" rows="4" cols="65" placeholder="What's happening?" id="text"
                      name="text" type="text" v-model="form.text"/>

            <div
              v-if="form.errors.has('text')"
              v-text="form.errors.get('text')[0]">
            </div>
        </div>

        <div class="flex">
            <div class="mb-4">
                <label class="form-label-aside" for="account">Account</label>
                <select
                  id="account"
                  v-model="form.account"
                  class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow leading-tight">
                    <option v-for="account in accounts">
                        {{ account }}
                    </option>
                </select>
                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-4 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label-aside" for="scheduledFor">Scheduled for</label>
                <input class="form-input" placeholder="YYYY-MM-DD hh:mm:ss" id="scheduledFor" name="scheduledFor"
                       type="text" v-model="form.scheduledFor">

                <div
                  v-if="form.errors.has('scheduledFor')"
                  v-text="form.errors.get('scheduledFor')[0]">
                </div>
            </div>
        </div>

        <button
          type="button"
          class="btn btn-blue"
          @click="createScheduledTweet"
        >
            Create scheduled tweet
        </button>
    </div>
</template>

<script>
import store from '../store';
import Form from 'form-backend-validation';
import moment from 'moment';

export default {
    props: ['accounts'],

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
            console.log('save');
            const response = await this.form.post('/api/scheduled-tweets');

            store.commit('addScheduledTweet', response.data);
        },
    },
};
</script>
