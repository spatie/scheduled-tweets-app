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
            this.$events.$emit('flashNow', { message, level });
        },
    },
};
