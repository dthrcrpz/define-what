import axios from 'axios'

export default {
    state: {
        wordData: {
            data: {
                word: ''
            }
        },
        wordIsRandom: true,
        loading: false
    },
    getters: {
        getWordData (state) {
            return state.wordData
        },
        getLoading (state) {
            return state.loading
        }
    },
    actions: {
        setWordData (context) {
            axios.get('/api/random-word').then(res => {
                context.commit('WORD_DATA', res.data)
                context.commit('WORD_IS_RANDOM', true)
            }).catch(err => {
                console.log(err)
            })
        },
        setLoading (context, data) {
            context.commit('LOADING', data)
        }
    },
    mutations: {
        WORD_DATA (state, data) {
            return state.wordData = data
        },
        LOADING (state, data) {
            return state.loading = data
        },
        WORD_IS_RANDOM (state, data) {
            return state.wordIsRandom = data
        }
    },
    strict: true
}