<template>

        <v-list class="overflow-y-auto" >
        
        <v-list-item-group  color="primary" style="max-height: 370px;">

          <v-list-item v-if="show == 1" 
            v-for="(message,i) in this.$store.state.messages1"
            :key="i"
          >
            <v-list-item-avatar style="bottom:0.9rem">
              <v-img :src="displayImage(message.user.avatar)"></v-img>
            </v-list-item-avatar>
            <v-list-item-content>
              <v-list-item-title><b>{{ message.user.name }}</b></v-list-item-title>
              <p  style="color:grey">{{ message.message }}<p/>
            </v-list-item-content>
          </v-list-item>


            <v-list-item v-if="show == 2" 
            v-for="(message,i) in this.$store.state.messages2"
            :key="i"
          >
            <v-list-item-avatar style="bottom:0.9rem">
              <v-img :src="displayImage(message.user.avatar)"></v-img>
            </v-list-item-avatar>
            <v-list-item-content>
              <v-list-item-title><b>{{ message.user.name }}</b></v-list-item-title>
              <p  style="color:grey">{{ message.message }}<p/>
            </v-list-item-content>
          </v-list-item>

        </v-list-item-group>
      </v-list>

</template>

<script>
  export default {
    props:['show'],
    data(){
        return{
            //
        }
    },
    created()
    {
        console.log("show",this.show)
    },
    methods:
    {
       displayImage(id)
       {
        // console.log(id)
        return this.$store.getters.displayImage(id);
        //this.$store.getters.displayImage(message.user.avatar)
       }
    }
  };
</script>


