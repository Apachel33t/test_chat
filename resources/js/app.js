import './bootstrap';
import {createApp} from "vue"
import Chat from './components/Chat.vue'

try {
    createApp(Chat).mount('#app')
} catch (e) {

}

