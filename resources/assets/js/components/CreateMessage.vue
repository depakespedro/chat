<template>
    <div class="row">
        <div class="col">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Введите сообщение" v-model="textMessage" aria-label="Введите никнейм">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button" @click="createMessage()">Отправить!</button>
                </span>
            </div>
        </div>
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