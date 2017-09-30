<template>
    <div>
        <input type="text" placeholder="Введите никнейм" v-model="nickName"/>
        <button @click="logged()">Войти</button>
        <button @click="logout()">Выйти</button>
        <div>
            {{ authUser }} - авторизован
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                nickName: "",
                authUser: "",
            }
        },

        props:['userCurrent'],

        methods:{
            logged: function(){
                axios.get('/auth/register/'+this.nickName)
                    .then(responce => {

                        axios.get('/auth/login/'+this.nickName)
                            .then(responce => {
                                this.$emit('logged', {});
                                this.authUser = this.nickName;
                                alert(responce.data);
                            })
                            .catch(error => {
                                this.authUser = '';
                                alert(error.data)
                            })

                    })
                    .catch(error => {
                        this.authUser = '';
                        alert(error.data);
                    })
            },

            logout: function(){
                axios.get('/auth/logout').then(responce => {
                    alert(responce.data);
                    this.$emit('logout', {});
                }).catch(error =>{
                    alert('error logout');
                })
            },
        }
    }
</script>

<style lang="css">
</style>