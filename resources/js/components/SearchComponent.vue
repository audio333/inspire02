<template>
	<div class="search-overlay" :class="{'search-overlay--active': isActive }">
		<toggle-overlay
		@openOverlay="openOverlay"
		@closeOverlay="closeOverlay">
	</toggle-overlay>
	<div class="search-overlay__top">
		<div class="container">
			<i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>

			<input type="text" placeholder="What are you looking for?" id="search-term" class="search-term"
				ref="search"
				v-model="query"
				@keydown="performSearch">

			<i class="fa fa-window-close search-overlay__close" aria-hidden="true" @click="closeOverlay"></i>
		</div>
	</div>

	<div class="container">
		<div id="search-overlay__results" v-if="query.length > 0">
			<!-- <div class="spinner-loader"></div> -->

			<h2 class="search-overlay__section-title">General Information</h2>
			<ul class="link-list min-list" v-if="searchResults.length > 0">
				<li v-for="(post, index) in searchResults">
					<a href="#">{{ post.item.title }}</a>
				</li>
			</ul>
			<p v-else>No general information matches that search.</p>
		</div>

	</div>
</div>
</template>

<script>
	import ToggleOverlay from './ToggleOverlay'
	import axios from 'axios'

	export default {
		components: {
			ToggleOverlay,
		},
		data() {
			return {
				isActive: false,
				query: '',
				posts: [],
				searchResults: [],
				options: {
					shouldSort: true,
					includeMatches: true,
					threshold: 0.5,
					location: 0,
					distance: 500,
					maxPatternLength:32,
					minMatchCharLength: 1,
					keys: ['title', 'content']
				}
			}
		},
		created() {
			axios.get('/api/posts')
				.then(response => {
					this.posts = response.data.data
				})
		},
		methods: {
			performSearch() {
				this.$search(this.query, this.posts, this.options)
					.then(results => {
						this.searchResults = results
					});
			},
			openOverlay() {
				this.isActive = true;
				setTimeout(() =>{ this.$refs.search.focus(); }, 301);
				document.querySelector('body').classList.add("body-no-scroll");
			},
			closeOverlay() {
				this.query = '';
				this.isActive = false;
				document.querySelector('body').classList.remove("body-no-scroll");
			}
		},
		mounted() {
			console.log('Search Component Mounted');
		}
	}
</script>
