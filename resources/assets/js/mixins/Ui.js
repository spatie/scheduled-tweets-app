import Vue from 'vue';

const events = new Vue();

export default {
    computed: {
        $events() {
            return events;
        },
    },

    methods: {
        $flashNow(message, level = 'success') {
            console.log('showing message');
            this.$events.$emit('flashNow', { message, level });
        },
    },
};
