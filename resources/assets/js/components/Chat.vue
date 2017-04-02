<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            Chatroom
            <span class="badge pull-right"></span>
        </div>

        <chat-list :messages="messages"></chat-list>
        <chat-form @addMessage="addMessage"></chat-form>
    </div>
</template>

<script>
    import ChatList from './ChatList.vue';
    import ChatForm from './ChatForm.vue';

    export default {
        components: {
            ChatForm,
            ChatList
        },
        data() {
            return {
                messages: []
            };
        },
        methods: {
            addMessage(text) {       
                axios.post('/messages', {message: text})
                    .then(res => {
                        this.messages.push(res.data.message);
                    })
                    .catch(err => {});
            },
            newMessage(message) {
                this.messages.push(message);
            }
        },
        created () {
            axios.get('/messages')
                .then(res => {
                    this.messages = res.data.messages;
                })
                .catch(err => {});
        },
        beforeMount() {
            this.$on('new-message', this.newMessage);

            Echo.join('chat').listen('NewMessage', (e) => {
                this.$emit('new-message', e.message);
            });
        }
    }
</script>

<style scoped lang="scss">
    .panel {
        display: flex;
        flex-direction: column;
        height: 100%;
        margin-bottom: 0;
    }
</style>