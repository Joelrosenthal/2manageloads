<template>
	<div>
		
		<input type="text" name="pick_store_search" id="pick_store_search" class="form-control" v-model="query" @keyup="search()" placeholder="search by pick store number, address, phone, etc...">

		<div class="row search-background" v-if="results.length">

			<div class="text-center" v-for="user in results">

				<h5 class="text-center">{{ user.analysis_region_name + ' ' + user.address }}</h5>

			</div>

		</div>

		

	</div>
</template>

<script>

	var algoliasearch = require('algoliasearch')

	var client = algoliasearch('FOI57C222C', '3eed1ff015b373eed1916d3e8d054d67')

	var index = client.initIndex('stores')

	export default {

		mounted() {

		},

		data() {
			return {
				query: '',

				results: []
			}
		},

		methods: {

			search() {

				index.search(this.query, (err, content) => {

					this.results = content.hits

				})
			}
		}
	}

</script>