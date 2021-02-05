import axios from 'axios'

import Vuex from 'vuex'
window.Vue = require('vue').default
import VueAxios from 'vue-axios'

window.Vue.use(Vuex)
window.Vue.use(VueAxios, axios)

// components
import Navbar from './components/Navbar'
import Foot from './components/Foot'
import Definition from './components/Definition'

import storeData from './store'
const store = new Vuex.Store(storeData)

const app = new Vue({
    el: '#app',
    components: {
    	Navbar, Foot, Definition
    },
    store,
    data () {
    	return {
    		message: 'wew'
    	}
    }
})