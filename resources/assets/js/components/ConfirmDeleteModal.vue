<template>
    <div class="modal-backdrop" v-show="show">
        <div class="modal">
            <h1 class="text-center text-2xl font-bold mb-4">
                Are you sure?
            </h1>
            <p class="text-center text-grey-darker mb-6">
                Deleting your scheduled tweet cannot be undone.
            </p>
            <div class="text-center">
                <button @click="cancel" type="button" class="btn btn-grey mr-4">
                    Cancel
                </button>
                <button @click="confirmDelete" type="button" class="btn btn-red">
                    Delete it
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import store from '../store';

export default {
    props: ['show', 'scheduledTweet'],
    methods: {
        cancel() {
            this.$emit('close');
        },
        confirmDelete() {
            store.dispatch('deleteScheduledTweet', this.scheduledTweet);

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
            console.log('removing listener');
            document.removeEventListener('keydown', listener);
        });
    },
};
</script>
