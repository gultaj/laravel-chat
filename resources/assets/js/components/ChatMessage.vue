<template>
    <div class="chat-message">
        <p>{{ message.title }}</p>
        <small>by {{ message.user.name }}<span class="badge bg-success">&nbsp;</span></small>
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
    .badge {
        margin-left: 5px;
        display: inline-block;
        min-width: 8px;
        font-size: 8px;
        font-weight: bold;
        color: #fff;
        line-height: 1;
        vertical-align: middle;
        white-space: nowrap;
        text-align: center;
        border-radius: 10px;
        &-online {
            background-color: #96ef72;
        }
        &-offline {
            background-color: #ef7272;
        }
    }


</style>   