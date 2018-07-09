<template>
    <button
      type="button"
      class="btn btn-red"
      @click="modalOpen = true"
    >
        Delete
        <portal to="modals" v-if="modalOpen">
            <confirm-delete-modal
              :show="modalOpen"
              @close="modalOpen = false"
              :scheduled-tweet="scheduledTweet"
            ></confirm-delete-modal>
        </portal>
    </button>
</template>

<script>
import ConfirmDeleteModal from './ConfirmDeleteModal';

export default {
    components: {
        ConfirmDeleteModal,
    },
    props: ['scheduledTweet'],
    data() {
        return {
            modalOpen: false,
        };
    },
};
</script>
