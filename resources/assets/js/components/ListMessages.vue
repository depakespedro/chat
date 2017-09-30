<template>
    <div>
        <div v-for="message in messages">
            <div class="p-3 mb-2 bg-info text-white">
                <small>Автор: {{ message.user.name }}</small>
                <p>{{ message.text }}</p>
            </div>
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