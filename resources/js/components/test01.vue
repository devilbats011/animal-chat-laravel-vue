<template>
    <v-form >
        <div v-if="!check">
        <v-text-field type="text" @keyup="setName" @keydown.enter.prevent
            dense
            label="Nickname"
          ></v-text-field>
          
        <p style="color:red">{{ error }}</p>

        <router-link :to="'/t2/'+ name" > Next </router-link>
       </div>
        <div v-if="check" >
          <p style="font-size:1rem">Redirect ... </p>
        </div>
    </v-form>
</template>
<script>
export default{
  props:['messages','user'],
  data () {
    return {
      name: '', 
      error:'',
      check:false
      //checkAuth:'none-default',
    }
  },
  methods: {
    setName (event) {
      // console.log("jwefjwekfwenf",this.name);
      this.name = event.target.value
      this.$store.commit('setName',this.name)
      console.log('ergergdegregeuwe:',this.$store.state.user.name)
      
     // console.log(this.name,"setname :29")
      this.error = "";
    },
    setSht()
    {
         return axios.get('/checking-user').then(data =>{
              console.log(data.status,data.data[0],"test01 52")
              //user exist so just skip to t3
              if(data.status == 200)
              {

                this.$store.commit("setName",data.data[0].name);
                this.$store.commit("setCheck",true);
                //this.check = true;
                this.$store.commit("setAvatar",data.data[0].avatar);

                console.log(this.$store.state.user,"44:")
               
                
              }
               return data.status
          })
         .catch(error=>{
           console.log(error,"/checking-user --> catch error")
           this.check = false;
          })
    },
    setTest()
    {
      console.log("test");
    }
  },
  beforeRouteEnter (to, from, next) {
        next((vm) =>{
           vm.check = true;
           const status = vm.setSht()
            status.then((p)=>{
              console.log(p,"0p")
                if(p == 200)
                {
                  next('/t3')
                }

            })
          

        });
  },
  beforeRouteLeave (to, from, next) {

      // if(this.check == true)
      //  next()
      // else
      // {
        // alert("wa?t :"+this.$store.state.user.name)
          if(this.$store.state.user.name == "" || this.$store.state.user.name == null){
            this.error = "your name please :) ... ";
            // console.log(this.error);
              next(false);
          }
          else{
            next();
          }

      // }

  },
  created()
  {

    //this.$store.state.user
         this.$store.commit('setDisplay',0)
  },
};
</script>
<style>
</style>