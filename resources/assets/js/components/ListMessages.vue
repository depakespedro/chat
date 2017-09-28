<template>
    <div>
        <table class="table" v-if="messages.length" >
            <thead>
            <tr>
                <th>Пользователь</th>
                <th>Текст</th>
                <th>Дата</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="message in messages">
                <td>{{ message.user.name }}</td>
                <td>{{ message.text }}</td>
                <td>{{ message.created_at }}</td>
            </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
    export default {

        data()
        {
            return{
                messages: [],
            }
        },

        created() {
            this.getAllMessages();

        },

        methods: {
            getAllMessages: function()
            {
                axios.get('/messages')
                    .then(response => {
                        console.log(response);
                        this.messages = response.data
                    })
            .catch(e => {
                console.log(e);
                })
            },

            addMesssage: function(message)
            {
                console.log(message);
                this.messages.push(message);
            },
        }
    }
</script>

<style>
    #account-name
    {
        text-transform: lowercase;
    }
</style>