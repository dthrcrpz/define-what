import axios from 'axios'

export default {
    state: {
        word: 'define',
        wordData: {
            data: {
                word: ''
            }
        },
        loading: true
    },
    getters: {
        getWordData (state) {
            return state.wordData
        },
        getLoading (state) {
            return state.loading
        },
        getWord (state) {
            return state.word
        }
    },
    actions: {
        setWordData (context) {
            context.commit('LOADING', true)
            axios.get('/api/words/define').then(res => {
                context.commit('WORD_DATA', res.data)
            }).catch(err => {
                console.log(err)
            }).then(() => {
                context.commit('LOADING', false)
            })
        },
        setLoading (context, value) {
            context.commit('LOADING', value)
        },
        searchWord (context, word) {
            context.commit('LOADING', true)

            axios.get(`/api/words/${word}`).then(res => {
                context.commit('WORD', word)
                context.commit('WORD_DATA', res.data)
            }).catch(err => {
                console.log(err)
            }).then(() => {
                context.commit('LOADING', false)
            })
        }
    },
    mutations: {
        WORD (state, value) {
            return state.word = value
        },
        WORD_DATA (state, data) {
            return state.wordData = data
        },
        LOADING (state, value) {
            return state.loading = value
        }
    },
    strict: true
}