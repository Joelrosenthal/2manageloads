<template>
	<div>
		
		<input type="text" name="commodity" id="commodity" class="form-control" v-model="query" @keyup="search()" placeholder="Make and Model is Recommended">

		<div class="row" v-if="results.length">

			<div class="text-center" v-for="user in results">

				<h4 class="text-center">{{ user.make + ' ' + user.model }}</h4>

			</div>

		</div>

	</div>
</template>

<script>

	var algoliasearch = require('algoliasearch')

	var client = algoliasearch('FOI57C222C', '3eed1ff015b373eed1916d3e8d054d67')

	var index = client.initIndex('equipment')

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