<template>
<v-form>
    
        <section class="wrapper-channel">
        <v-chip class=" cursor child-channel" color="deep-purple lighten-5" label @click="setTest" >
            <!-- <p class="" > Animal Caffee Channel </p> -->
           <v-icon left>mdi-flower-tulip-outline</v-icon>
            Animal Caffee Channel 

        </v-chip>
        <v-chip class=" cursor child-channel" color="deep-purple lighten-5" label @click="setTest2" >
           <v-icon left>mdi-atlassian</v-icon>
            Zoo Caffee Channel 
        </v-chip>
        </section>
        <v-divider> </v-divider>
      <div v-if="show == true">
        <p  class="title-c" >Animal Caffee Chat</p>
      <chatmessage :show="showToggle" /> 
      <chatform  v-on:messagesent="sendMessage"  :show="showToggle" />
      </div>

      <div v-if="show2 == true">
         <p  class="title-c" >Zoo Caffee Chat</p>
        <chatmessage :show="showToggle" /> 
        <chatform  v-on:messagesent="sendMessage" :show="showToggle" />
      </div>
</v-form>
</template>

<script>

  import cf from './ChatForm2'
  import cm from './ChatMessages2'
	export default{
    components: {
      'chatform' : cf ,
      'chatmessage' : cm,
    },
    props:['user','message'],
	data () {
    return {
      images:['/img/owl1.jpg','/img/chicken.jpg','/img/frog.jpg'],
      i:0,
      test:"fireTest",
      show:false,
      show2:false,
      userHere: this.user,
      messagehere: this.message,
      // messages:[],
    }
  },
  computed:
  {
    showToggle()
    {

      return this.show == true? 1:2;
    }
  },
  methods: {
        sendMessage(e) {

          // console.log(e,"eeee");
          this.$emit('messagesent',e);
      },
       async fetchMessages() {
          let messages1 = await axios.get('/messages/1');
          this.$store.commit('setmessages1',messages1.data);
          let messages2 = await axios.get('/messages/2');
          this.$store.commit('setmessages2',messages2.data);
        
          // setTimeout(()=>console.log(this.$store.state.messages1,'fm1|fm2',this.$store.state.messages2) ,1000)

        
        },
  		setTest()
  		{
        // alert("show:"+this.show.toString() )
        this.show = !this.show;
        this.show2 = false;
  		},
      setTest2()
      {
        // alert("show2:"+this.show2.toString() )
        this.show2 = !this.show2;
        this.show = false;
      },
      testStore(){
        this.test = this.$store.state.v;
      }


  },
  created(){

      this.$store.commit('setDisplay',2)
      this.fetchMessages();

      Echo.private('chat')
      .listen('MessageSent', (e) => {
            console.log(" test03.vue echo laravel",e)
            let message = {};
            message.channel_id = e.message.channel_id
            message.message = e.message.message
            message.user = {
                name:e.user.name,
                avatar:e.user.avatar,
                email:e.user.email
            }

            if(message.channel_id == 1)
            this.$store.commit('addMessage1',message)
            else if (message.channel_id == 2)
            this.$store.commit('addMessage2',message)

      });

      // console.log(this.$store.state.user.name);
      // console.log(this.$store.state.user.avatar);

    },
    beforeRouteEnter (to, from, next) {
    		console.log(to.params.i);
    		next((vm) =>{vm.i = to.params.i});

  },
};
</script>
<style lang="css">
  .title-c{
    font-size: 1rem;
    color: #19251a;
    text-align: center;
  }
	.cursor{
			cursor: pointer !important;
	}
  .wrapper-channel
  {
    display: flex;
    flex-direction: row;
    /*align-items: baseline;*/
  }
  .child-channel
  {
    margin:0 0.5rem;
    height: 2.4rem;
  }

  .child-channel > p
  {
    margin: 1rem;
    vertical-align: middle;
  }

  .child-channel:active {
    box-shadow: 0 5px 11px rgba(145, 92, 182, .4);
    background-color: #a2f56e;
  }

/*  .fade-enter-active {
  transition: opacity .5s
}

.fade-enter,
.fade-leave-active {
  opacity: 0
}*/
</style>
