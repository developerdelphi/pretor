require('./bootstrap')
require('./main')


window.Vue = require('vue')

import Vue from 'vue'
import App from './components/App.vue'
import VueResource from 'vue-resource'
import VueRouter from 'vue-router'
import {routes} from './routes'

Vue.use(VueResource)

Vue.http.options.root = 'http://localhost:8000';

Vue.use(VueRouter)

const router = new VueRouter({
    routes,
    mode: 'history'
})

new Vue({
    el: '#app',
    router,
    render: h => h(App),
});
