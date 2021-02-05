<template>
	<nav>
		<div class="container">
			<div class="logo-container">
				<a href="/">
					<logo/>
					<span>Define <br> What</span>
				</a>
			</div>
			<form @submit.prevent="search()" class="search-bar-container">
				<input type="text" name="query" placeholder="Enter a word">
				<button>
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="Layer 2" id="Layer_2"><path d="M18,10a8,8,0,1,0-3.1,6.31l6.4,6.4,1.41-1.41-6.4-6.4A8,8,0,0,0,18,10Zm-8,6a6,6,0,1,1,6-6A6,6,0,0,1,10,16Z"/></g></svg>
				</button>
			</form>
		</div>
	</nav>
</template>

<script>
	import Logo from './Logo'

	export default {
		components: {
			Logo
		},
		methods: {
			search () {
				console.log('wew')
			}
		}
	}
</script>