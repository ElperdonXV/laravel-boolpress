require('./bootstrap');
window.Vue = require('vue');
import App from './views/App';
const app = new Vue({
    el: '#app',
    render: h => h(App),
});