<template>
    <div>
        <input type="text" placeholder="Введите сообщение" v-model="textMessage"/>
        <button @click="createMessage()">Отправить</button>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                textMessage: ""
            }
        },

        methods:{
            createMessage: function(){
                axios.get('/message/'+this.textMessage).then(responce => {
                    console.log('createMEssage');
                    this.$emit('sendmessageevent', {
                        text: this.textMessage
                    });
                    this.textMessage = "";
                }).catch(error =>{
                    alert('error send message');
                })
            }
        }
    }
</script>

<style lang="css">
</style>