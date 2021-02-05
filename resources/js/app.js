window.Vue = require('vue').default

// components
import Navbar from './components/Navbar'
import Foot from './components/Foot'
import Definition from './components/Definition'

const app = new Vue({
    el: '#app',
    components: {
    	Navbar, Foot, Definition
    },
    data () {
    	return {
    		message: 'wew'
    	}
    }
})
