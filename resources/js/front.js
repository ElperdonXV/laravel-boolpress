require('./bootstrap');
window.Vue = require('vue');
import App from './views/App';
import Home from './pages/Home';
import VueRouter from 'vue-router';
import Vue from 'vue';
Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        }
    ]
});

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});