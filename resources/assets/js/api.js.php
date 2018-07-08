import axios from 'axios'

export default {
    getTweets() {
        return axios.get('/api/scheduled-tweets')
    }
}