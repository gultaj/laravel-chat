<template>
    <div class="chat-form">
        <input type="text" placeholder="Star typing your message...">
        <button class="btn btn-primary">Send</button>
    </div>
</template>

<script>
    export default {

    }
</script>

<style lang="scss">
    .chat-form {
        display: flex;
        input {
            flex: 1 auto;
        }
        button {
            border-radius: 0;
        }
    }
</style>