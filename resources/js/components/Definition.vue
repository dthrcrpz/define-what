<template>
	<div class="definition">
		<div class="not-found" v-if="!loading && notFound">
			<div class="container">
				No results found for <i><u>{{ word }}</u></i>
			</div>
		</div>
		<transition name="fade">
			<loader v-if="loading"></loader>
			<div class="container" v-if="!loading && !notFound">
				<p class="word-searched">
					{{ wordData.data.word }}
				</p>
				<div class="pronunciation"><span>\</span> {{ wordData.data.pronunciation.all }} <span>\</span></div>
				<div class="definitions-group-container">
					<div class="group" v-for="(result, key) in wordData.data.results">
						<div class="part-of-speech">{{ result.partOfSpeech }}</div>
						<div class="label-group">
							<div class="label">Definition:</div>
							<div class="value">{{ result.definition }} </div>
						</div>
						<div class="label-group" v-if="result.examples">
							<div class="label">Example(s):</div>
							<div class="value">
								<p class="examples" v-for="(example, key) in result.examples">{{ example }}</p>
							</div>
						</div>
						<div class="label-group synonyms" v-if="result.synonyms">
							<div class="label">Synoyms:</div>
							<div class="value">
								<a href="javascript:void(0)" @click="search(synonym)" v-for="(synonym, key) in result.synonyms">
									{{ needComma(synonym, result.synonyms, key) }}
								</a>
							</div>
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
				loading: 'getLoading',
				wordData: 'getWordData',
				notFound: 'getNotFound',
				word: 'getWord'
			})
		},
		methods: {
			needComma (word, allData, key) {
				if (allData.length - 1 == key) {
					return word
				} else {
					return `${word},`
				}
			},
			search (word) {
				this.$store.dispatch('searchWord', word)
			}
		}
	}
</script>