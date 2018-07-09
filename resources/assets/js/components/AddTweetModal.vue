<template>
    <div class="modal-backdrop" v-show="show">
        <div class="modal">

            <label for="account">Account</label>
            <input id="account" name="account" type="text" v-model="form.account">
            <div
                 v-if="form.errors.has('account')"
                 v-text="form.errors.get('account')[0]">
            </div>

            <label for="text">Text</label>
            <input id="text" name="text" type="text" v-model="form.text">
            <div
                v-if="form.errors.has('text')"
                v-text="form.errors.get('text')[0]">
            </div>

            <label for="scheduledFor">Scheduled for</label>
            <input  id="scheduledFor" name="scheduledFor" type="text" v-model="form.scheduledFor">
            <div
                v-if="form.errors.has('scheduledFor')"
                v-text="form.errors.get('scheduledFor')[0]">
            </div>

            <div class="text-center">
                <button @click="cancel" type="button" class="btn btn-grey mr-4">
                    Cancel
                </button>
                <button
                    @click="save"
                    type="button"
                    class="btn"
                >
                    Save
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import store from '../store';
    import Form from 'form-backend-validation';

    export default {
        props: ['scheduledTweet', 'show'],

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
            async save() {
                console.log('save');
                const response = await this.form.post('/api/scheduled-tweets')

                store.commit('addScheduledTweet', response.data);

                this.$emit('close');
            },
        },
        watch: {
            show: {
                immediate: true,
                handler: show => {
                    if (show) {
                        document.body.style.setProperty('overflow', 'hidden');
                    } else {
                        document.body.style.removeProperty('overflow');
                    }
                },
            },
        },
        created() {
            const listener = document.addEventListener('keydown', e => {
                if (this.show && e.keyCode === 27) {
                    this.cancel();
                }
            });

            this.$once('hook:beforeDestroy', () => {
                document.removeEventListener('keydown', listener);
            });
        },
    };
</script>
