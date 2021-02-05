<template>
	<div class="definition">
		<transition name="fade">
			<loader v-if="loading"></loader>
			<div class="container" v-if="!loading">
				<p class="word-searched">kill</p>
				<div class="definitions-group-container">
					<div class="group">
						<div class="part-of-speech">Noun</div>
						<div class="pronunciation"><span>\</span> kɪl <span>\</span></div>
						<div class="label-group">
							<div class="label">Definition:</div>
							<div class="value">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.</div>
						</div>
						<div class="label-group">
							<div class="label">Example:</div>
							<div class="value">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.</div>
						</div>
						<div class="label-group">
							<div class="label">Synoyms:</div>
							<div class="value">wala, meron, ewan</div>
						</div>
						<div class="label-group">
							<div class="label">Antonyms:</div>
							<div class="value">wala, meron, ewan</div>
						</div>
					</div>
				</div>
			</div>
		</transition>
	</div>
</template>

<script>
	import { mapMutations, mapGetters } from 'vuex'
	import Loader from './Loader'

	export default {
		components: {
			Loader
		},
		computed: {
			...mapGetters({
				loading: 'getLoading'
			})
		},
	}
</script>