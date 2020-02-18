<template>
    <main>
    <div class="input-group">
        <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keydown.enter.prevent="sendMessage">

        <span class="input-group-btn" style="margin:auto auto auto 7px">
       <!--      <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                Send
            </button> -->

            <v-btn id="btn-chat" small color="primary" @click="sendMessage" >Send</v-btn  >

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
        name:'chatform',
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
                console.log(this.show,"sssssssmmmmmm")
                this.$emit('messagesent', {
                    user: this.$store.state.user,
                    message: this.newMessage,
                    channel_id:this.show,
                });

                this.newMessage = ''
            },
            insert(emoji) {
            this.input += emoji
            },
            test(){

                alert("helloTest");
            }


        }
    };
</script>