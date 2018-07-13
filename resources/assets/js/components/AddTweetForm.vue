<template>
    <div>

        <div class="row">
            <textarea class="form-input tweet-box" rows="4" cols="65" placeholder="What's happening?" id="text"
                      name="text" type="text" v-model="form.text"/>
            <div>
                {{ this.charactersLeft }}
            </div>
        </div>

        <div class="row mt-2 validation-error"
          v-if="form.errors.has('text')"
          v-text="form.errors.get('text')[0]">
        </div>

        <div class="row mt-4">
            <div class="mr-4">
                <label class="form-label-aside" for="account">Account</label>
                <select
                  id="account"
                  v-model="form.account"
                  class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow leading-tight">
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
            console.log('save');
            const response = await this.form.post('/api/tweets');

            store.commit('addTweet', response.data);
        },
    },
};
</script>
