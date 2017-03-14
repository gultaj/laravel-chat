<template>
    <div class="chat-list">
        <chat-message v-for="message in messages" :message="message"></chat-message>
    </div>
</template>

<script>
    import ChatMessage from './ChatMessage.vue';

    export default {
        components: {
            ChatMessage
        },
        props: ['messages']
    }
</script>

<style lang="scss">
    .chat-list {
        flex: 1 0 auto;
        max-height: calc(100vh - 165px);
        overflow: auto;
        .chat-message:nth-child(even) {
            background-color: #eee;
        }
    }
</style>