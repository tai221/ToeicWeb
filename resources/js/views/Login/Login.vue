<template>
    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" v-model="account.username" >

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" v-model="account.password">

        <button type="submit" v-on:click="login()">Login</button>
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
                }
            }
        },
        methods:{
            login(){
                // let app = this;
                // let account = app.account;
                // axios.post('/api/v1/login', account)
                //     .then(function (resp) {
                //         console.log(resp.data);
                //     })
                //     .catch(function (resp) {
                //         alert("Could not login");
                //     });
                this.$store.dispatch('retrieveToken',this.account)
                .then(response => {
                    this.$router.push({name:'userIndex'})
                })
            }
        }
    }
</script>

<style scoped>

</style>
