import Vue from 'vue'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-default/index.css'
import locale from 'element-ui/lib/locale/lang/en'
import {ServerTable, ClientTable, Event} from 'vue-tables-2';

Vue.use(ClientTable);
Vue.use(ElementUI, { locale })
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('shipmentstable', require('./components/ShipmentsTable.vue'));
Vue.component('datepicker', require('./components/Datepicker.vue'));
Vue.component('commoditysearch', require('./components/CommoditySearch.vue'));
Vue.component('pickcomponent', require('./components/PickComponent.vue'));
Vue.component('deliverysearch', require('./components/DeliverySearch.vue'));


const app = new Vue({
    el: '#app'
});



/** Display google map when cities are entered **/

$(document).on('click', '#google_map_btn', function(){
  
	var pick_city = $("#pick_city").val();
    var pick_state = $("#pick_state").val();
    var delivery_city = $("#delivery_city").val();
    var delivery_state = $("#delivery_state").val();

$('#google_map').html("<iframe class='center-block' width='100%' height='400' frameborder='5' scrolling='no' marginheight='0' marginwidth='0' src='https://www.google.com/maps/embed/v1/directions?key=AIzaSyBsrHsyaDhAw8CupGAEd_6M3hnPjO89mQ8&origin="+pick_city+","+pick_state+"&destination="+delivery_city+","+delivery_state+"&mode=driving&units=imperial'></iframe>");

});

/** Display google map when zip codes are entered **/

$(document).ready(function(){
  $('#pick_zip').keyup(function() {
    var zipCode = $(this).val();
      if(zipCode.length === 5 && $.isNumeric(zipCode)) 
      {
			$.ajax({
		      type: "GET",
		      beforeSend: function(request) {
		        request.setRequestHeader("x-key", "7fdf923c5fb9dccddad8bdd98b828933e801fd73");
		      },
		      url: "https://zip.getziptastic.com/v3/US/"+zipCode,
		      success: function(data) {
		        //console.log(data[0].city);
		    $("#pick_city").val(data[0].city);
		    $("#pick_state").val(data[0].state_short);
		      }
		    });
		}

 });
 });


$(document).ready(function(){
  $('#delivery_zip').keyup(function() {
    var zipCode = $(this).val();
      if(zipCode.length === 5 && $.isNumeric(zipCode)) {

		$.ajax({
	      type: "GET",
	      beforeSend: function(request) {
	        request.setRequestHeader("x-key", "7fdf923c5fb9dccddad8bdd98b828933e801fd73");
	      },
	      url: "https://zip.getziptastic.com/v3/US/"+zipCode,
	      success: function(data) {
	        
	    $("#delivery_city").val(data[0].city);
	    $("#delivery_state").val(data[0].state_short);


		    var pick_city = $("#pick_city").val();
		    var pick_state = $("#pick_state").val();
		    var delivery_city = $("#delivery_city").val();
		    var delivery_state = $("#delivery_state").val();

    

			$('#google_map').html("<iframe class='center-block' width='100%' height='400' frameborder='5' scrolling='no' marginheight='0' marginwidth='0' src='https://www.google.com/maps/embed/v1/directions?key=AIzaSyBsrHsyaDhAw8CupGAEd_6M3hnPjO89mQ8&origin="+pick_city+","+pick_state+"&destination="+delivery_city+","+delivery_state+"&mode=driving&units=imperial'></iframe>");
				}
    		});
		}
	});
 });

 $(function() {
    $( ".plannedpicker, .actualpicker, .planneddeliverypicker, .actualdeliverypicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  });
