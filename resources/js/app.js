require('./bootstrap')
require('./main')



window.Vue = require('vue')

import Vue from 'vue'
import VueRouter from 'vue-router'
import {routes} from './routes'
import Swal from 'sweetalert2'
import VueResource from 'vue-resource'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify'
import pt from 'vuetify/es5/locale/pt'
import en from 'vuetify/es5/locale/en'
import App from './components/App.vue'
import store from './store'

Vue.use(VueResource)

Vue.http.options.root = 'http://localhost:8000';

Vue.use(VueRouter)

const router = new VueRouter({
    routes,
    mode: 'history',
    linkActiveClass: 'active'
})

const MY_ICONS = {
    'complete': 'check',
    'cancel': 'cancel',
    'close': 'close',
    'delete': 'cancel', // delete (e.g. v-chip close)
    'clear': 'clear',
    'success': 'check_circle',
    'info': 'info',
    'warning': 'priority_high',
    'error': 'warning',
    'prev': 'chevron_left',
    'next': 'chevron_right',
    'checkboxOn': 'check_box',
    'checkboxOff': 'check_box_outline_blank',
    'checkboxIndeterminate': 'indeterminate_check_box',
    'delimiter': 'fiber_manual_record', // for carousel
    'sort': 'arrow_upward',
    'expand': 'keyboard_arrow_down',
    'menu': 'menu',
    'subgroup': 'arrow_drop_down',
    'dropdown': 'arrow_drop_down',
    'radioOn': 'radio_button_checked',
    'radioOff': 'radio_button_unchecked',
    'edit': 'edit',
    'ratingEmpty': 'star_border',
    'ratingFull': 'star',
    'ratingHalf': 'star_half',
    'loading': 'cached',
    'search': 'search'
}
Vue.use(Vuetify,{
    iconfont: 'md',
    icons: MY_ICONS,
    lang:{
          locales: {en, pt},
          current: 'pt'
    }
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
    router,
    store,
    el: '#app',
    render: h => h(App),
});
