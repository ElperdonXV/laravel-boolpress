require('./bootstrap');
window.Vue = require('vue');
import App from './views/App';
import Home from './pages/Home';
import Contact from './pages/Contact';
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
            name: 'contacts',
            component: Contact
        },
        {
            path: '/posts/:id',
            name: 'post',
            props: true,
            component: Post
        }
    ]
});

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});