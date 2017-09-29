<template>
    <div>
        <input type="text" placeholder="Введите никнейм" v-model="nickName"/>
        <button @click="logged()">Войти</button>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                nickName: ""
            }
        },

        methods:{
            logged: function(){
                axios.get('/auth/login/'+this.nickName).then(responce => {
                    alert('ok');
                }).catch(error =>{
                    alert('error login');
                })
            }
        }
    }
</script>

<style lang="css">
</style>