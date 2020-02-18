<template>
    <ul class="chat">
        <li><h1>HELLO CHAT</h1></li>
        
        <li class="left clearfix" v-for="message in this.$store.state.messages1">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        {{ message.user }}
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>


    <!--     <ul class="chat">

        <li class="left clearfix" v-for="message in this.$store.state.messages1" 
        v-if="show == 1" >
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                      {{ message.user.name }} 
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>

     <li class="left clearfix" v-for="message in this.$store.state.messages2" 
        v-if="show == 2" >
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                      {{ message.user.name }} 
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
      </li>
    </ul> -->
</template>

<script>
  export default {
    //props: ['messages'],
    data(){
        return{
            //
        }
    }
  };
</script>


