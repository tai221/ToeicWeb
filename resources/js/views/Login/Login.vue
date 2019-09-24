<template>
    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" v-model="account.username" ><br>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" v-model="account.password"><br>

        <input type="checkbox" v-model="remember" > Remember me<br>
        <button type="submit" v-on:click="login()">Login</button><br>
        <router-link :to="{name:'resetPassword'}">or Do you forgot password?</router-link>

    </div>
</template>

<script>
    export default {
        name: "Login",
        data(){
            return{
                account: {
                    username:'',
                    password:''
                },
                remember: false
            }
        },
        methods:{
            login(){
                let data = {
                    account: this.account,
                    remember: this.remember
                };
                this.$store.dispatch('retrieveToken',data)
                .then(response => {
                    this.$router.push({name:'userIndex'})
                })
            }
        }
    }
</script>

<style scoped>

</style>
