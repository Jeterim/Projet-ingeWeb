import Echo from "laravel-echo"
import Pusher from 'pusher-js'
console.log('something');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '50727aae1e64e8f538e6',
    cluster: 'eu',
    // encrypted: true

});

console.log('something');
window.Echo.channel('potin-deleted.1')
    .listen('.potin-deleted', (e) => {
        console.log(e)
    });
// @todo: Set up Echo bindings here


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap'); 
// Comments by Quentin 
// wasn't use before 

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
