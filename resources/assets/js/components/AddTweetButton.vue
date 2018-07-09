<template>
    <button
      type="button"
      class="btn btn-blue"
      @click="modalOpen = true"
    >
        Add tweet
        <portal to="modals" v-if="modalOpen">
            <add-tweet-modal
              :show="modalOpen"
              @close="modalOpen = false"
            ></add-tweet-modal>
        </portal>
    </button>
</template>

<script>
    import AddTweetModal from './AddTweetModal';

    export default {
        components: {
            AddTweetModal,
        },

        data() {
            return {
                modalOpen: false,
            };
        },
    };
</script>
