import './bootstrap';
import 'babel-polyfill';
import Chat from './components/Chat.vue';

const app = new Vue({
    el: '#app',
    components: {
        Chat
    }
});
