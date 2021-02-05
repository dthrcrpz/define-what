window.Vue = require('vue').default

// components
import Navbar from './components/Navbar'

const app = new Vue({
    el: '#app',
    components: {
    	Navbar
    },
    data () {
    	return {
    		message: 'wew'
    	}
    }
})
