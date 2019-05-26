require('./bootstrap')
require('./main')


window.Vue = require('vue')

import Vue from 'vue'
import App from './components/App.vue'
import VueRouter from 'vue-router'
import {routes} from './routes'
import Swal from 'sweetalert2'
import VueResource from 'vue-resource'

Vue.use(VueResource)

Vue.http.options.root = 'http://localhost:8000';

Vue.use(VueRouter)

const router = new VueRouter({
    routes,
    mode: 'history',
    linkActiveClass: 'active'
})

export const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

window.Toast = Toast;
window.Swal = Swal;

new Vue({
    el: '#app',
    router,
    render: h => h(App),
});
