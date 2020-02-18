/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('chat-form', require('./components/ChatForm.vue').default);
Vue.component('chat-messages', require('./components/ChatMessages.vue').default);
Vue.component('chooseyouravatar',require('./components/ChooseYourAvatar.vue').default);
//cant usse big word..


// import Home from './components/Home.vue';
// import App from './components/ChooseYourAvatar';
// import { Picker } from 'emoji-mart-vue';
// import VuePageTransition from 'vue-page-transition';
// import { EmojiPickerPlugin } from 'vue-emoji-picker'
import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuetify from 'vuetify';
import { routes } from './routes.js';
import Vuex from 'vuex'

Vue.use(Vuex)
// import store from './store'


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.use(VueRouter);
Vue.use(Vuetify);


const router = new VueRouter({
    mode: 'history',
    routes
});

const store = new Vuex.Store({
  state: {
    count: 0,
    messages1:[],
    messages2:[],
    images:[
        '/img/owl1.jpg',
        '/img/owl2.jpg',
        '/img/owl3.jpg',
        '/img/chicken.jpg',
        '/img/frog.jpg',
        '/img/panda.jpg',
        '/img/koala.jpg',
        '/img/tiger.jpg',
        '/img/bear.jpg',
        '/img/piggy.jpg',
        '/img/fox.jpg',
        '/img/monkey.jpg',
    ],
    user:{name:"",avatar:"0",check:false},
    displayContent:
    [
    'Got A Cool Nickname? 😎',
    'Choice Your Avatar',
    'Choose Any Channel'
    ],
    display:"",
  },
  mutations: {
    increment (state) {
      state.count++
    },
    setName (state,name) {
      state.user.name =  name;

    },
    setAvatar (state,avatar) {
      state.user.avatar =  avatar;
    },
    setCheck (state,check) {
      state.user.check =  check;
    },
    setDisplay (state,id) {

      state.display =  state.displayContent[id]
      if(id !=0 )
        state.display+=' ,'+state.user.name+' :D';
    },
    setmessages1(state,payload)
    { state.messages1 = payload },
    addMessage1(state,message)
    { state.messages1.push(message) },

    setmessages2(state,payload)
    { state.messages2 = payload },
    addMessage2(state,message)
    { state.messages2.push(message) }

  },
    getters: {
        display: (state) => (id) => {
      return state.displayContent[id]
    },
    displayImage: (state) => (id) => {
      return state.images[id]
    }
    //     fm: (state)=>(c_id) =>{
    //         axios.get('/messages/'+c_id).then(response => {
    //              state.messages1 = response.data;
    //              return state.messages1;
    //              console.log(response.data,"fecthhing")
    //         });
    // }
  }
})


const app = new Vue({
    name: 'app',
    el: '#app',
    store,
    router,
    vuetify: new Vuetify(),
    data: {
        messages: [],
        user:{ name: "default"},
        test:"helloApp"
      
    },
    created() {
        //

    },

    methods: {
        setUser(user)
        {
            this.user = {...this.user,name:user.name}
            console.log('setUser :97 -->',this.user )
        },
        addMessage(message) {
            if(message.message != ""){
                console.log(message,"addMessagEnter");
                if(message.channel_id == 1)
                this.$store.commit('addMessage1',message)
                else if (message.channel_id == 2)
                this.$store.commit('addMessage2',message)
                

                axios.post('/messages', message).then(response => {
                  console.log(response.data,"add",this.messages);
                });
            }
        },
        sendName(){
            let test = {test:"fireTest"};
            axios.post('/xxx', test).then(response => {
          //    console.log(response.data,"respond of sendName");
            });
        },

    }
});

export default app;
