import axios from 'axios'

export default {
    state: {
        word: 'define',
        wordData: {
            data: {
                word: '',
                pronunciation: {
                    all: ''
                }
            },
            antonyms: {
                antonyms: []
            }
        },
        previousSearches: [],
        loading: true,
        notFound: false
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
        },
        getNotFound (state) {
            return state.notFound
        },
        getPreviousSearches (state) {
            return state.previousSearches
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
                context.dispatch('setPreviousSearches')
            })
        },
        setPreviousSearches (context) {
            context.commit('PREVIOUS_SEARCHES', [])

            axios.get('/api/previous-searches').then(res => {
                context.commit('PREVIOUS_SEARCHES', res.data.previousSearches)
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
                context.commit('WORD_DATA', res.data)
                context.commit('NOT_FOUND', false)
            }).catch(err => {
                console.log(err)
                context.commit('NOT_FOUND', true)
            }).then(() => {
                context.commit('WORD', word)
                context.dispatch('setPreviousSearches')
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
        },
        NOT_FOUND (state, value) {
            return state.notFound = value
        },
        PREVIOUS_SEARCHES (state, data) {
            return state.previousSearches = data
        }
    },
    strict: true
}