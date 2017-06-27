import Vue from 'vue'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-default/index.css'
import locale from 'element-ui/lib/locale/lang/en'
import {ServerTable, ClientTable, Event} from 'vue-tables-2';


Vue.use(ClientTable);
Vue.use(ElementUI, { locale });

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
Vue.component('commoditysearch', require('./components/CommoditySearch.vue'));
Vue.component('pickanddeliverycomponent', require('./components/PickAndDeliveryComponent.vue'));

const app = new Vue({
    el: '#app'

    
});




 $(function() {
    $( ".plannedpicker, .actualpicker, .planneddeliverypicker, .actualdeliverypicker, .daterangestart, .daterangeend" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  });
