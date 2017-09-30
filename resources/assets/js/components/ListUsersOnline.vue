<template>
    <div class="row">
        <div class="col">
            <!--<div class="input-group">-->
                <ul class="list-group">
                    <li class="list-group-item">Онлайн:</li>
                    <li class="list-group-item" v-for="user in users">{{ user.name }}</li>
                </ul>
            <!--</div>-->
        </div>
    </div>


</template>

<script>
    export default {
        props: ["users"]
    }
</script>
