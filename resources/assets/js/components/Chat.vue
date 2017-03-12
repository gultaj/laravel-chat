<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            Chatroom
            <span class="badge pull-right"></span>
        </div>

        <chat-list :messages="messages"></chat-list>
        <chat-form></chat-form>
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
                        title: 'New messgae',
                        user: 'User 1'
                    },
                    {
                        title: 'Test message',
                        user: 'User 2'
                    }
                ]
            };
        }
    }
</script>