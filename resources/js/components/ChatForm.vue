<template>
    <main>
    <div class="input-group">
        <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter.prevent="sendMessage">

        <span class="input-group-btn">
       <!--      <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                Send
            </button> -->

            <v-btn small color="primary" @click="sendMessage" >Send</v-btn id="btn-chat" >

        </span>
    </div>
<!--                <h1> em-oji</h1>
                <emoji :emoji="{ id: 'santa', skin: 3 }" :size="16" />
<emoji emoji=":santa::skin-tone-3:" :size="16" />
<emoji emoji="santa" set="emojione" :size="16" />
<emoji emoji=":cool:" set="emojione" :size="16" /> -->

<!-- <picker set="emojione" /> -->

<br>

</main>
</template>

<script>
    import { Picker } from 'emoji-mart-vue';
    import { Emoji } from 'emoji-mart-vue';
    import EmojiPicker from 'vue-emoji-picker';
    export default {
        props: ['user','show'],
                components: {
            'emoji': Emoji,
            'picker':Picker,
            'emoji-picker':EmojiPicker,
    
        } ,
        data() {
            return {

                newMessage: '',
                input: '',
                search: '',
            }
        },
        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage
                });

                this.newMessage = ''
            },
            insert(emoji) {
            this.input += emoji
            },
            test(){

                alert("helloTest");
            }


        },
        directives: {
        focus: {
      inserted(el) {
        el.focus()
      },
    },
  },
    };
</script>