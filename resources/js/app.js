/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// import depencies tambahan
import VueRouter from 'vue-router'
import routes from './router'
import VueAxios from 'vue-axios';
import Axios from 'axios';

Vue.use(VueRouter, VueAxios, Axios);

Vue.component('navigation', require('./components/Navigation').default);

const app = new Vue({
    el: '#app',
    // inisialisasi route
    router: new VueRouter(routes),
});