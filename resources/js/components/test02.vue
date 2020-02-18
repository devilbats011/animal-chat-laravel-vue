<template>
<v-form>
    <v-container>
      <v-row>

        <v-col style="float: left;">
		 <v-row justify="space-around">

        <router-link :to="'/t3/'+ index" v-for="(item,index) in this.$store.state.images" v-bind:key="index"  >
		    <v-avatar size="120px" class="cursor"  >
             <!-- v-on:click="chosenAvatar(index)" -->
		      <v-img :src="item" alt="--"  />
		    </v-avatar>
        </router-link>

<!-- 		    <v-avatar size="120px" class="cursor">
		      <img  :src="'/img/chicken.jpg'" alt="ciken">
		    </v-avatar>

		    <v-avatar size="120px" class="cursor" >
		      <img :src="'/img/frog.jpg'" alt="frog" >
		    </v-avatar> -->

		  </v-row>
             <br>
    
</v-col>
</v-row>
</v-container>
</v-form>
</template>

<script>
	export default{
    props:['user'],
	data () {
    return {
      name: 'fellow user',
      // images:['/img/owl1.jpg','/img/chicken.jpg','/img/frog.jpg'],
      i:0
    }
  },
  methods: {

  		chosenAvatar(index)
  		{
  			// console.log(index);
  			//this.i = index;
        console.log(index);
        this.$store.commit('setAvatar',index)
        console.log(' test02 51 -->user avatar:',this.$store.state.user.avatar)
         return axios.post('/animal/user',this.$store.state.user)

  		},


  },
    beforeRouteEnter (to, from, next) {
    		console.log(to.params," test02 :54");

    		next((vm) =>{vm.name = to.params.name});

  },
    beforeRouteLeave (to, from, next) {
      
      let user = this.chosenAvatar(to.params.avatar)
      user.then((response)=>
        {
          console.log(" test02 :70 responses" ,response.data)
          next()
        })
      
  },
  created()
  {
         console.log("test02.js 61 state.setName:--.",this.$store.state.user.name) // -> 1

          this.$store.commit('setDisplay',1)

  },
};
</script>
<style lang="css">
	.cursor{
			cursor: pointer !important;
	}
/*.a{
	height: 1500px;
	background-color: black !important;
}	*/
</style>
