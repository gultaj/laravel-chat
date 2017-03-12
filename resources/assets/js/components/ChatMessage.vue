<template>
    <div class="chat-message">
        <p>{{ message.title }}</p>
        <small>by {{ message.user }}</small>
    </div>
</template>

<script>
    export default {
        props: ['message']
    }
</script>

<style lang="scss">
    .chat-message {
        padding: 1rem;
        p {
            margin-bottom: .5rem;
        }
    }
</style>   