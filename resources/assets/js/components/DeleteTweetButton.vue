<template>
    <button
      type="button"
      class="text-red-dark hover:underline"
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
    import ConfirmDeleteModal from "./ConfirmDeleteModal"

    export default {
        components: {
            ConfirmDeleteModal
        },
        props: ['scheduledTweet'],
        data() {
            return {
                modalOpen: false
            }
        }
    }
</script>
