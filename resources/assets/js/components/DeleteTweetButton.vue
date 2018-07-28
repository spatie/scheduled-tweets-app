<template>
    <button
      type="button"
      class="text-red underline hover:text-red-dark"
      @click="modalOpen = true"
    >
        Delete
        <portal to="modals" v-if="modalOpen">
            <confirm-delete-modal
              :show="modalOpen"
              @close="modalOpen = false"
              :tweet="tweet"
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
    props: ['tweet'],
    data() {
        return {
            modalOpen: false,
        };
    },
};
</script>
