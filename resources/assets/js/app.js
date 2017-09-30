
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('listmessages', require('./components/ListMessages.vue'));
Vue.component('createmessage', require('./components/CreateMessage.vue'));
Vue.component('listusersonline', require('./components/ListUsersOnline.vue'));
Vue.component('login', require('./components/Login.vue'));

const app = new Vue({
    el: '#app',
    data:{
        messages:[],
        usersOnline: [],
    },

    created(){
        this.updateMessages();
    },

    methods:{
        updateMessages: function () {
            console.log('updateMEssages');
            axios.get('/messages').then(responce => {
                this.messages = responce.data.reverse();
            });
        },

        logoutUser: function () {
            console.log('logoutUser');
            Echo.leave('chat-room-presence');
            Echo.leave('chat-room');
        },

        initEcho: function(){
            Echo.channel('chat-room')
                .listen('MessageCreated', (e) => {
                    this.updateMessages();
                });

            Echo.join('chat-room-presence')
                .here(users => {
                    this.usersOnline = users;
                })
                .joining(user => {
                console.log('join');
                    this.usersOnline.push(user);
                })
                .leaving(user => {
                    this.usersOnline = this.usersOnline.filter(u => u != user);
                });
        }
    }
});
