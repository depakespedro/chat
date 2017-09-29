<template>
    <div>
        <div v-for="message in messages">
            <p>Сообщение: {{ message.text }}</p>
            <small>Автор: {{ message.user.name }}</small>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['messages']
    }
</script>

<style lang="css">
</style>