require('./bootstrap');

window.Vue = require('vue');

import router from './router/routers'
Vue.component('admin-component', require('./components/admin/AdminComponent').default)

const app = new Vue({
    router,
    el: '#app'
});
