<template>
    <div>
        <div v-for="user in users">
            {{ user.name }}
        </div>
    </div>
</template>

<script>
    export default {
        props: ["users"]
    }
</script>
