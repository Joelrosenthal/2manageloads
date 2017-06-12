<template>
	<div>
		
		<input type="text" name="commodity" id="commodity" class="form-control" v-model="query" @keyup="search(query)" placeholder="Make and Model is Recommended">

		<div class="row commodity-search-background" v-if="results.length">

			<div class="text-center" v-for="equip in results">


				<a v-on:click="select_commodity(equip.make, equip.model, equip.commodity, equip.length, equip.width, equip.height, equip.weight)" class="text-center">{{ equip.make + ' ' + equip.model + ' ' + equip.commodity + ' ' + equip.length + ' ' + equip.width + ' ' + equip.height + ' ' + equip.weight }}</a>

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

			search(query) {

				if(query.length > 3){

				index.search(this.query, (err, content) => {

					this.results = content.hits

				})
			}
			},

			select_commodity: function(make, model, commodity, length, width, height, weight) {

				
				this.query = make + ' ' + model + ' ' + commodity + ' ' + length + ' ' + width + ' ' + height + ' ' + weight
				this.results = [];
			},
		}
	}

</script>