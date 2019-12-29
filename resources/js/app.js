/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

// vue router
window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use (VueRouter);

//vue resource
import VueResource from 'vue-resource';
Vue.use (VueResource);


//sweetalert2

import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
window.Toast = Toast;

//moment support

import {filter} from './filter'

//vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from './store/index'
const store = new Vuex.Store(storeData);


import {routes} from "./route";
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('home', require('./components/Admin/Dashboard.vue'));


// const router = new VueRouter({
//     routes,
// });

//vform
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)




const router = new VueRouter({
    routes,
    mode:'hash'
});

const app = new Vue({
    router,
    Toast,
    store,
    el: '#app',
});

// const app = new Vue({
//     router,
// }).$mount("#app");
