/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('datatables.net-bs4');
require('datatables.net-responsive-bs4');

import moment from "moment";

import Vue from 'vue';
import Jobs from "./components/Jobs";
import JobItem from "./components/Jobs/JobItem";
import JobMap from "./components/Jobs/JobMap";
import JobForm from "./components/Jobs/JobForm";

import Search from "./components/Search";
import RangeFilter from "./components/RangeFilter";
import FileUpload from "./components/FileUpload";
import AddressLookup from "./components/AddressLookup";

import { Fragment } from 'vue-fragment';
import vSelect from 'vue-select';
import Pagination from 'laravel-vue-pagination';
import VueSweetalert2 from 'vue-sweetalert2';
import CKEditor from '@ckeditor/ckeditor5-vue2';

import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

import { 
    LMap, LTileLayer, LMarker, 
    LTooltip, LCircle, LIcon,
    LPopup
} from 'vue2-leaflet';
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

// Vue mixins
Vue.mixin({
    methods: {
        requestWithoutHeaders(headers) {
            // Create a new request instance
            var request = axios.create();

            // Loop through the array of request headers
            headers.forEach(header => {
                // Delete each request header
                delete request.defaults.headers.common[header];
            });

            // Return the request instance with the specificed headers deleted
            return request;
        }
    }
});

Vue.use(VueSweetalert2);
Vue.use(VueToast, {
    position: 'top-right',
});

// Installed vue packages
Vue.component('fragment', Fragment);
Vue.component('l-map', LMap);
Vue.component('l-tile-layer', LTileLayer);
Vue.component('l-marker', LMarker);
Vue.component('l-tooltip', LTooltip);
Vue.component('l-circle', LCircle);
Vue.component('l-icon', LIcon);
Vue.component('l-popup', LPopup);
Vue.component('v-select', vSelect);
Vue.component('pagination', Pagination);

// Components required across the app
Vue.component('search', Search);
Vue.component('range-filter', RangeFilter);
Vue.component('file-upload', FileUpload);
Vue.component('address-lookup', AddressLookup);

// Jobs
Vue.component('jobs', Jobs);
Vue.component('job-item', JobItem);
Vue.component('job-map', JobMap);
Vue.component('job-form', JobForm);

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