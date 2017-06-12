<template>
<div>

	<div class="row">
		<div class="col-md-4">
			<label for="pick_city" class="label-control">Pick City</label>
			<input type="text" id="pick_city" name="pick_city" v-model="pick_city" class="form-control">
		</div>
		<div class="col-md-2">
			<label for="pick_state" class="label-control">Pick State</label>
			<input type="text" id="pick_state" name="pick_state" v-model="pick_state" class="form-control">
		</div>

		<div class="col-md-2">
			<label for="pick_zip" class="label-control">Pick Zip Search</label>
			<input type="text" id="pick_zip" name="pick_zip" class="form-control" v-model="pick_zip" placeholder="search Zip">
		</div>
		
		<div class="col-md-4">
			<label for="pick_store_search" class="label-control">Pick Store Search</label>
			<input type="text" name="pick_store_search" id="pick_store_search" class="form-control" v-model="pick_query" @keyup="pick_search(pick_query)" placeholder="search by pick store number, address, phone, etc...">
		
			<div class="row search-background" v-if="pick_results.length">
				<div class="text-center" v-for="pick in pick_results">
					<a v-on:click="select_pick_store(pick.pc_number, pick.analysis_region_name, pick.address, pick.city, pick.state, pick.zip)" class="text-center">{{ pick.pc_number + ' ' + pick.analysis_region_name + ' ' + pick.address + ' ' + pick.city + ' ' + pick.state + ' ' + pick.zip }}</a>
				</div>
			</div>
		</div>
		

		
		</div>  
	
	<div class="row">
		<div class="col-md-4">
			<label for="delivery_city" class="label-control">Delivery City</label>
			<input type="text" id="delivery_city" name="delivery_city" v-model="delivery_city" class="form-control">
		</div>
		<div class="col-md-2">
		<div class="input-group">
			<label for="delivery_state" class="label-control">Delivery State</label>
			<input type="text" id="delivery_state" name="delivery_state" v-model="delivery_state" class="form-control">

			<span class="input-group-btn">
					<button id="google_map_btn" v-on:click="google_map" class="btn btn-default btn-success" type="button">MAP!</button>
      			</span>
      	</div>
		</div>

		<div class="col-md-2">
			<label for="delivery_zip" class="label-control">Delivery Zip Search</label>
			<input type="text" id="delivery_zip" name="delivery_zip" class="form-control" v-model="delivery_zip" placeholder="search Zip">
		</div>

		

		
		<div class="col-md-4">
			<label for="delivery_store_search" class="label-control">Delivery Store Search</label>
			<input type="text" name="delivery_store_search" id="delivery_store_search" class="form-control" v-model="query" @keyup="search(query)" placeholder="search by delivery store number, address, phone, etc...">
		
			<div class="row search-background" v-if="results.length">
				<div class="text-center" v-for="user in results">
					<a v-on:click="select_delivery_store(user.pc_number, user.analysis_region_name, user.address, user.city, user.state, user.zip)" class="text-center">{{ user.pc_number + ' ' + user.analysis_region_name + ' ' + user.address + ' ' + user.city + ' ' + user.state + ' ' + user.zip }}</a>
				</div>
			</div>
		</div>
		
		
		
		</div> 

		<div id="mapping" v-html="mapHtml"></div>
	</div>
</template>

<script>



	var algoliasearch = require('algoliasearch')

	var client = algoliasearch('FOI57C222C', '3eed1ff015b373eed1916d3e8d054d67')

	var index = client.initIndex('stores')

	export default {



		data() {
			return {
				
				mapHtml: '',
				pick_query: '',
				pick_results: [],
				pick_city: '',
				pick_state: '',
				pick_zip: '',
				query: '',
				results: [],
				delivery_city: '',
				delivery_state: '',
				delivery_zip: ''
			}
		},

		watch: {
			pick_zip: function(){
				this.pick_city = ''
				if(this.pick_zip.length == 5){
					this.lookUpPickZip()
				}
			}, 

			delivery_zip: function(){
				this.delivery_city = ''
				if(this.delivery_zip.length == 5){
					this.lookUpDeliveryZip()
				}
			}

		},
		

		methods: {

			lookUpPickZip: _.debounce(function(){
				var app = this
				app.pick_city = "Searching..."
				axios.get('http://ziptasticapi.com/' + app.pick_zip)
				.then(function(response){
					app.pick_city = response.data.city
					app.pick_state = response.data.state
				})
				.catch(function(error){
					app.pick_city = "Invalid Zipcode"
				})

			}, 500),

			lookUpDeliveryZip: _.debounce(function(){
				var app = this
				app.delivery_city = "Searching..."
				axios.get('http://ziptasticapi.com/' + app.delivery_zip)
				.then(function(response){
					app.delivery_city = response.data.city
					app.delivery_state = response.data.state
				})
				.catch(function(error){
					app.delivery_city = "Invalid Zipcode"
				})

			}, 500),


			google_map: function(){

				this.mapHtml  =  "<iframe class='center-block' width='100%' height='400' frameborder='5' scrolling='no' marginheight='0' marginwidth='0' src='https://www.google.com/maps/embed/v1/directions?key=AIzaSyBsrHsyaDhAw8CupGAEd_6M3hnPjO89mQ8&origin="+this.pick_city+","+this.pick_state+"&destination="+this.delivery_city+","+this.delivery_state+"&mode=driving&units=imperial'></iframe>"

			},

			select_pick_store: function(pc_number, analysis_region_name, address, city, state, zip) {

				this.pick_city = city
				this.pick_state = state
				this.pick_query = pc_number + ' ' + analysis_region_name + ' ' + address + ' ' + city + ' ' + state + ' ' + zip
				this.pick_results = [];
			},

			select_delivery_store: function(pc_number, analysis_region_name, address, city, state, zip) {

				this.delivery_city = city
				this.delivery_state = state
				this.query = pc_number + ' ' + analysis_region_name + ' ' + address + ' ' + city + ' ' + state + ' ' + zip
				this.results = [];
			},

			search(query) {

				if(query.length > 3){
				
				index.search(this.query, (err, content) => {

					this.results = content.hits

				})
			}
			},

			pick_search(pick_query) {

				if(pick_query.length > 3){
				
				index.search(this.pick_query, (err, content) => {

					this.pick_results = content.hits

				})
			}
			}

			
		}

	}

</script>