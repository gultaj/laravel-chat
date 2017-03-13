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
                messages: [
                    {
                        title: 'New message',
                        user: 'User 1'
                    },
                    {
                        title: 'Test message',
                        user: 'User 2'
                    }
                ]
            };
        },
        methods: {
            addMessage(text) {
                this.messages.push({title: text, user: 'Test user'});
                axios.post('/messages', {message: text})
                    .then(res => console.log(res))
                    .catch(err => console.log(err));
            }
        },
    }
</script>