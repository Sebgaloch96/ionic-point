/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('datatables.net-bs4');
require('datatables.net-responsive-bs4');

import moment from "moment";
import Swal from 'sweetalert2/dist/sweetalert2.js';

window.Swal = Swal;

import Vue from 'vue';
import Jobs from "./components/Jobs";
import Job from "./components/Jobs/Job";
import Search from "./components/Search";
import RangeFilter from "./components/RangeFilter";
import CustomMap from "./components/CustomMap";

import vSelect from 'vue-select';
import Pagination from 'laravel-vue-pagination';
import VueSwal from 'vue-swal';

import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

import { LMap, LTileLayer, LMarker, LTooltip, LCircle } from 'vue2-leaflet';
import 'leaflet/dist/leaflet.css';

import { Icon } from 'leaflet';

delete Icon.Default.prototype._getIconUrl;
Icon.Default.mergeOptions({
    iconRetinaUrl: require('leaflet/dist/images/marker-icon-2x.png'),
    iconUrl: require('leaflet/dist/images/marker-icon.png'),
    shadowUrl: require('leaflet/dist/images/marker-shadow.png'),
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Global filters
Vue.filter('fromNow', value => moment(value).fromNow());
Vue.filter('standardFormat', value => moment(value).format('DD/MM/YYYY'));
Vue.filter('toMiles', value => {
    return parseInt(Math.round(value / 1609.344));
});

Vue.use(VueSwal);
Vue.use(VueToast, {
    position: 'top-right',
});

// Installed vue packages
Vue.component('l-map', LMap);
Vue.component('l-tile-layer', LTileLayer);
Vue.component('l-marker', LMarker);
Vue.component('l-tooltip', LTooltip);
Vue.component('l-circle', LCircle);
Vue.component('v-select', vSelect);
Vue.component('pagination', Pagination);

// Components required across the app
Vue.component('custom-map', CustomMap);
Vue.component('search', Search);
Vue.component('range-filter', RangeFilter);

// Jobs
Vue.component('jobs', Jobs);
Vue.component('job', Job);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

// Custom JS Scripts
require('./hub/main');