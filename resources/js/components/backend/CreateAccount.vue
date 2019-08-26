<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'manageaccount'}" class="btn btn-info">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-primary">Create new account</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Username</label>
                            <input type="text" v-model="account.username" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Email</label>
                            <input  type="text" v-model="account.email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Password</label>
                            <input type="password" v-model="account.password" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Role</label>
                            <select v-model="account.hasRole">
                                <option>ROLE_ADMIN</option>
                                <option>ROLE_USER</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Create</button>
                        </div>
                    </div>
                    <span>{{errors}}</span>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateAccount.vue",
        data(){
            return{
                account: {
                    username:'',
                    password:'',
                    email:'',
                    hasRole:'',
                    active:1
                },
                errors: ''
            }
        },
        methods: {
            saveForm(){
                event.preventDefault();
                var app = this;
                var account = app.account;
                console.log(account);
                axios.post('/api/v1/account', account)
                    .then(function (resp) {
                        console.log(resp);
                        app.$router.push({name: 'manageaccount'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your account");
                    });
            }

        },
        watch: {
            email(){
                if (!this.validEmail(this.account.email)) {
                    console.log('change');
                    this.errors='Valid email required.';
                }else{
                    this.errors='';
                }
            },
            validEmail(email){
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }
        }
    }
</script>

<style scoped>

</style>
text
