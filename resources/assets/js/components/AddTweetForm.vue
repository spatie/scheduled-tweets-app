<template>
    <div>

        <div class="mb-4">
            <label class="form-label" for="account">Account</label>
            <input class="form-input" id="account" name="account" type="text" v-model="form.account">
            <div
              v-if="form.errors.has('account')"
              v-text="form.errors.get('account')[0]">
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label" for="text">Text</label>
            <input class="form-input" id="text" name="text" type="text" v-model="form.text">
            <div
              v-if="form.errors.has('text')"
              v-text="form.errors.get('text')[0]">
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label" for="scheduledFor">Scheduled for</label>
            <input class="form-input" id="scheduledFor" name="scheduledFor" type="text" v-model="form.scheduledFor">
            <div
              v-if="form.errors.has('scheduledFor')"
              v-text="form.errors.get('scheduledFor')[0]">
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

    export default {
        data() {
            return {
                form: new Form({
                    account: '',
                    text: '',
                    scheduledFor: ''
                }),
            }
        },
        methods: {
            cancel() {
                this.$emit('close');
            },
            async createScheduledTweet() {
                console.log('save');
                const response = await this.form.post('/api/scheduled-tweets')

                store.commit('addScheduledTweet', response.data);

            },
        },
    }
</script>
