<template>
    <div>
        <table>
            <tr>
                <th>Text</th>
                <th>Scheduled for</th>
                <th>Sent at</th>
            </tr>

        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                'scheduledTweets': []
            }
        },

        created() {
            scheduledTweets = getTweets
        }


    }
</script>