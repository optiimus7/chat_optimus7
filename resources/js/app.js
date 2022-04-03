require('./bootstrap');

window.Vue = require('vue').default;

import store from './store/store'

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('chat', require('./components/chat/Chat').default);
Vue.component('users', require('./components/chat/User').default);
Vue.component('messages', require('./components/chat/Messages').default);
Vue.component('message', require('./components/chat/Message').default);

const app = new Vue({
    store,
    el: '#app',
});
