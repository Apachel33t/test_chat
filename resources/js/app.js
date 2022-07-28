import './bootstrap';
import {createApp} from "vue"
import Chat from './components/Chat.vue'

//var i = 0;
//window.Echo.channel('user-channel')
//    .listen('.UserEvent', (data) => {
//        i++;
//        $("#notification").append('<div class="alert alert-success">'+i+'.'+data.title+'</div>');
//    });


createApp(Chat).mount('#app')

