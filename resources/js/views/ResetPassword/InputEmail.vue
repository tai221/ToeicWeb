<template>
    <div>
        <span>Enter your email:</span><br>
        <input type="text" v-model="email"><br>
        <button type="submit" v-on:click="sendEmail()">Send email</button><br>
        <span>{{message}}</span>
    </div>
</template>

<script>
    import {sendMail} from "../../api/auth";

    export default {
        name: "InputEmail",
        data(){
            return{
                email:'',
                message: ''
            }
        },
        methods: {
            sendEmail(){
                let app = this;
                let email = {'email': app.email}
                sendMail(email)
                    .then(response => {
                        app.message = response.data.message;
                    })
                    .catch(error => {
                        console.log('loi')
                        console.log(error)
                    })
            }
        }
    }
</script>

<style scoped>

</style>
