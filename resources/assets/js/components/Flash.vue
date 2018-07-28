<template>
    <div
      v-if="show"
      class="alert alert-flash"
      role="alert"
    >
        {{ body }}
    </div>
</template>

<script>
export default {
    props: ['message'],

    data() {
        return {
            body: '',
            show: false,
        };
    },

    created() {
        this.$events.$on('flashNow', data => this.flash(data));
    },

    methods: {
        flash(data) {
            this.body = data.message;
            this.show = true;

            window.setTimeout(() => {
                this.hide();
            }, 3000);
        },

        hide() {
            this.show = false;
        },
    },
};
</script>
