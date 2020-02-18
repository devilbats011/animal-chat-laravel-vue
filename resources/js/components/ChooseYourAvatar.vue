<template>
  <v-card class="mx-auto" max-width="500" >
    <v-system-bar
      color="green lighten-2"
      dark
    >
    </v-system-bar>

        <!-- 
                #Use Route
                #there will be three component here:
                1.Whats Your Name
                2.Choice Your Avatar Icon
                3.Choice What Channel ..(put 2 channel - 1.AnimalCafee | - 2.ZooCaffee)
        -->

    <v-toolbar
      color="green lighten-1"
      dark
    >

      <v-toolbar-title class="pl-1" >
        
       <h3 align="center" > {{this.$store.state.display}} </h3>

      </v-toolbar-title>

      <v-spacer></v-spacer>
      <v-tooltip bottom>
        <template v-slot:activator="{ on }">
        <v-btn icon color="white" style="margin-right: 0.1rem" href="/logout" dark v-on="on" >
          <v-icon>mdi-logout</v-icon>
        </v-btn>
       </template>
        <span>Log Out</span>
      </v-tooltip>

    </v-toolbar>

    <v-container fluid>
      <v-row>
        <v-col key="string" cols=12 >

     <transition
        name="fade"
        mode="out-in"
      >
      
      <router-view :messages="messages" v-on:messagesent="sendMessage" :user="user"
      ></router-view>
    </transition>

    </v-col>
  </v-row>
</v-container>
</v-card>
</template>

<script>

    
    export default {
        props:['user'],
        // props:{
        //   messages: {
        //     type: Object,
        //   },
        //   // Object with a default value
        //   user: {
        //     type: Object,
        //     // Object or array defaults must be returned from
        //     // a factory function
        //     default: function () {
        //       return { name: 'hello' }
        //     }
        //   },


        // },
        data(){
          return {
            messages:[],
            
          }
        },
        created()
        {
          //
        },
    methods:{
      setUser(user)
      {
        this.$emit('setUserx',user);
        console.log(' setUser chooseyouavatar :85 user-->',user.name )
      },
      sendMessage(e) {
        // console.log("HELLO SENDMESSAGE!",e);
        this.$emit('messagesent', e);
      },

    }
    // created(){
    //   console.log("HELLLOOO AVATR");
    //   console.log(this.messages);

    // }
};


</script>

<style>

 a{
    text-decoration: none !important;
  }

.fade-enter-active,
.fade-leave-active {
  transition-duration: 0.3s;
  transition-property: opacity;
  transition-timing-function: ease;
}

.fade-enter,
.fade-leave-active {
  opacity: 0
}

</style>