export default {
    state: {
        wordData: {},
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
        setWordData (context, data) {
            context.commit('WORD_DATA', data)
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
        }
    },
    strict: true
}