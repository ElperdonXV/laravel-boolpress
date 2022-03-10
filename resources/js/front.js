require('./bootstrap');
window.Vue = require('vue');
import App from './views/App';
import Home from './pages/Home';
import About from './pages/About';
import Post from './pages/Post';
import Posts from './pages/Posts';
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
        },
        {
            path: '/',
            name: 'posts',
            component: Posts
        },
        {
            path: '/',
            name: 'post',
            component: Post
        },
        {
            path: '/',
            name: 'about',
            component: About
        }
    ]
});

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});