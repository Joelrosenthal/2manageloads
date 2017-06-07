<template>
	
	<div class="row">
		<div class="col-md-4">
			<label id="pick_city" class="label-control">Pick City</label>
			<input type="text" id="pick_city" name="pick_city" v-model="pick_city" class="form-control">
		</div>
		<div class="col-md-4">
			<label id="pick_state" class="label-control">Pick State</label>
			<input type="text" id="pick_state" name="pick_state" v-model="pick_state" class="form-control">
		</div>
		
		<div class="col-md-4">
			<label id="pick_store_search" class="label-control">Pick Store Search</label>
			<input type="text" name="pick_store_search" id="pick_store_search" class="form-control" v-model="query" @keyup="search(query)" placeholder="search by pick store number, address, phone, etc...">
		
			<div class="row search-background" v-if="results.length">
				<div class="text-center" v-for="user in results">
					<a v-on:click="select_pick_store(user.pc_number, user.analysis_region_name, user.address, user.city, user.state, user.zip)" class="text-center">{{ user.pc_number + ' ' + user.analysis_region_name + ' ' + user.address + ' ' + user.city + ' ' + user.state + ' ' + user.zip }}</a>
				</div>
			</div>
		</div>
		

		
		</div> <!-- end div row -->
	
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

				

				results: [],

				pick_city: '',
				pick_state: ''
			}
		},

		methods: {

			select_pick_store: function(pc_number, analysis_region_name, address, city, state, zip) {

				this.pick_city = city
				this.pick_state = state
				this.query = pc_number + ' ' + analysis_region_name + ' ' + address + ' ' + city + ' ' + state + ' ' + zip
				this.results = [];
			},

			search(query) {

				if(query.length > 3){
				
				index.search(this.query, (err, content) => {

					this.results = content.hits

				})
			}
			}
		}
	}

</script>