<template>
    <div class="chat-form">
        <input type="text" id="message" name="message" @keydown.enter="addMessage" placeholder="Star typing your message..." v-model="text">
        <button class="btn btn-primary" @click.prevent="addMessage">Send</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                text: ''
            };
        },
        methods: {
            addMessage() {
                if (this.text.length) {
                    this.$emit('addMessage', this.text);
                    this.text = '';
                }
            }
        }
    }
</script>

<style lang="scss">
    .chat-form {
        display: flex;
        input {
            flex: 1 auto;
            padding-left: 1rem;
            margin-left: -1px;
            margin-right: -1px;
        }
        button {
            border-radius: 0;
            margin-right: -1px;
        }
    }
</style>