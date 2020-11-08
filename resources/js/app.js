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

import Jobs from "./components/Jobs";
import Job from "./components/Jobs/Job";
import Search from "./components/Search";
window.Vue = require('vue');

import vSelect from 'vue-select'

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.filter('fromNow', value => moment(value).fromNow());

Vue.component('v-select', vSelect);
Vue.component('pagination', require('laravel-vue-pagination'));

Vue.component('search', Search);
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