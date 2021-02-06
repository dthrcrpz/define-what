<template>
	<div class="side-nav" v-if="!loading">
		<div class="group-container antonyms-container" v-if="wordData.antonyms.antonyms.length > 0">
			<div class="title">Antonyms:</div>
			<a href="javascript:void(0)" v-for="(antonym, key) in wordData.antonyms.antonyms" @click="search(antonym)">{{ needComma(antonym, wordData.antonyms.antonyms, key) }}</a>
		</div>
		<div class="group-container recent-searches">
			<div class="title">Most Recent Searches:</div>
			<div class="search-group" v-for="(previousSearch, key) in previousSearches" :key="key">
				<a href="javascript:void(0)" @click="search(previousSearch.word)">{{ previousSearch.word }}</a>
				<span>{{ previousSearch.count }}</span>
			</div>
		</div>
	</div>
</template>

<script>
	import { mapGetters } from 'vuex'

	export default {
		computed: {
			...mapGetters({
				loading: 'getLoading',
				wordData: 'getWordData',
				notFound: 'getNotFound',
				previousSearches: 'getPreviousSearches'
			})
		},
		methods: {
			needComma (word, allData, key) {
				if (allData.length - 1 == key) {
					return word
				} else {
					return `${word}, `
				}
			},
			search (word) {
				this.$store.dispatch('searchWord', word)
			}
		}
	}
</script>