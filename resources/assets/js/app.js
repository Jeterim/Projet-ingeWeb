import Echo from "laravel-echo"
import Pusher from 'pusher-js'

// console.log($('meta[name="csrf-token"]').attr('content'));
// Ensure the server that post request comes from a valid source.
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Connect a listeer to pusher service
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '50727aae1e64e8f538e6',
    cluster: 'eu',
    encrypted: true,

});

// Listen to the private channel
window.Echo.private('potin-deleted.'+userId)
    .listen('.potin-deleted', (e) => {
        // console.log(e.user, e.post, e.message);

        $.ajax({
            type:'GET',
            url:'/getNotifications',
            success: function(data) {
                var dropdown = $('#notification-dropdown');
                var counter = 0;
                $('#notification-dropdown').empty();
                data.forEach( function(notification) { 
                    dropdown.append('<li><a href="#" id="'+notification.id+'">'+ notification.data +'<span class="deletenotif glyphicon glyphicon-trash" data-id="'+ notification.id +'" aria-hidden="true"></span></a></li>');
                    counter = counter +1;
                });
                document.querySelector("#notification-badge").innerHTML = counter;
            },
            error: function(data) {
                console.log('Error: '+data);
                console.log(data);
            }
	    });

        
    });

// Add an onclick listener so each trash now deletes the notification
$('.deletenotif').on('click', function(event) {
    var notif_id = $(this).data('id');
    $.ajax({
        type:'POST',
        url:'/deleteNotification',
        data: {id: notif_id},
            success: function(data) {
                $('#'+notif_id).remove();
                minusNotifCounter();
            },
            error: function(data) {
                console.error('Error updating your notifs');
            }
	});

});

function minusNotifCounter() {
    var notification_badge = document.querySelector("#notification-badge");
    var value  = Number(notification_badge.textContent) -1;
    document.querySelector("#notification-badge").innerHTML = value;
}
function plusNotifCounter() {
    var notification_badge = document.querySelector("#notification-badge");
    var value  = Number(notification_badge.textContent) -1;
    document.querySelector("#notification-badge").innerHTML = value;
}
function zeroNotifCounter() {
    document.querySelector("#notification-badge").innerHTML = 0;
}

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap'); 
// Comments by Quentin 
// wasn't use before 

// window.Vue = require('vue');

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//     el: '#app'
// });
