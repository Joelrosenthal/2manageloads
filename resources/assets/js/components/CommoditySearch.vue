<template>
	<div>
		
		<input v-on-clickaway="away" type="text" name="commodity" id="commodity" class="form-control" v-model="query" @keyup="search(query)" placeholder="Make and Model is Recommended">

		<div class="row commodity-search-background" v-if="results.length">

			<div class="" v-for="equip in results">


				<a v-on:click="select_commodity(equip.make, equip.model, equip.commodity, equip.length, equip.width, equip.height, equip.weight)" class="text-center">{{ equip.commodity + ': ' + equip.make + ' ' + equip.model + ' ' + equip.length + '" X ' + equip.width + '" X ' + equip.height + '" ' + equip.weight + 'lbs.' }}</a>

			</div>

		</div>

	</div>
</template>

<script>

	var algoliasearch = require('algoliasearch')

	var client = algoliasearch('FOI57C222C', '3eed1ff015b373eed1916d3e8d054d67')

	var index = client.initIndex('equipment')

	export default {

	mixins: [VueClickaway.mixin],

	mounted() {
			this.getPostData();
		},

		data() {
			return {
				query: '',
				commodity: '',
				results: []
			}
		},

		methods: {

			search(query) {

				if(query.length > 3){

				index.search(this.query, (err, content) => {

					this.results = content.hits

				})
			} else { this.results = []; }
			},

			select_commodity: function(make, model, commodity, length, width, height, weight) {

				
				this.query = commodity + ': ' + make + ' ' + model + ' ' + length + '" X ' + width + '" X ' + height + '" ' + weight + 'lbs.'
				this.results = [];
			},
			
			getPostData() {
								if(window.hasOwnProperty('post')) {

			this.query=window.post.commodity;
			}
			
			},

			away: function() {
      			this.results = [];
    		},
		}
	}

</script>