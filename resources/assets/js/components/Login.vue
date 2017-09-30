<template>
    <div class="row">
        <div class="col">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Введите никнейм" aria-label="Введите никнейм" v-model="nickName">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button" @click="logged()">Войти!</button>
                    <button class="btn btn-secondary" type="button" @click="logout()">Выйти!</button>
                </span>
            </div>
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

        methods:{
            logged: function(){
                axios.get('/auth/register/'+this.nickName)
                    .then(responce => {

                        axios.get('/auth/login/'+this.nickName)
                            .then(responce => {
                                this.$emit('logged', {});
                                this.authUser = this.nickName;
                                alert('logged');
                            })
                            .catch(error => {
                                this.authUser = '';
                                alert('no logged')
                            })

                    })
                    .catch(error => {
                        this.authUser = '';
                        alert('error register new user');
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