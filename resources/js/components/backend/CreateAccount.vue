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
                            <span class="error">{{error.username}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Email</label>
                            <input  type="text" v-model="account.email" class="form-control">
                            <span class="error">{{error.email}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Password</label>
                            <input type="password" v-model="account.password" class="form-control">
                            <span class="error">{{error.password}}</span>
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
                        <div class="col-xs-12 form-group " v-bind:class="{create: !submit}">
                            <button class="btn btn-success " v-bind:class="{disabled: !submit}" >Create</button>
                        </div>
                    </div>

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
                error: {
                    username:'',
                    email:'',
                    password:''
                },
                check: {
                    username:false,
                    email:false,
                    password:false,
                    role:false
                }
                // submit: false
            }
        },
        computed: {
            email(){
                return this.account.email;
            },
            password(){
                return this.account.password;
            },
            submit(){
                    if(this.account.username != '' && this.check.email && this.check.password && this.account.hasRole != '') {
                        return true;
                    } else {
                        return false;
                    }
            }
        },
        watch: {
            email() {
                if (!this.validEmail(this.account.email)) {
                    this.error.email = 'Valid email required.';
                } else {
                    this.error.email = '';
                    // this.submit = true;
                    this.check.email = true;
                }
            },
            password(){
                if(!this.validPassword(this.account.password)){
                    this.error.password = 'Password must be 8 characters or longer';
                } else {
                    this.error.password = '';
                    this.check.password = true;
                }
            }

        },
        methods: {
            saveForm(){
                event.preventDefault();
                var app = this;
                var account = app.account;
                axios.post('/api/v1/account', account)
                    .then(function (resp) {
                        if(resp.data.checkUsername && resp.data.checkEmail) {
                            app.error.username = 'Username exists!';
                            app.error.email = 'Email exists!';
                        } else if(resp.data.checkUsername) {
                            app.error.username = 'Username exists!';
                        } else if(resp.data.checkEmail) {
                            app.error.email = 'Email exists!';
                        } else {
                            app.error.username = '';
                            app.error.email = '';
                            app.$router.push({name: 'manageaccount'});
                        }
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your account");
                    });
            },
            validEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            },
            validPassword(password) {
                var re = /^(?=.{8,})/;
                return re.test(password);
            }

        }

    }
</script>

<style scoped>
    .error{
        color: #ff1e1c;
    }
    .disabled {
        pointer-events: none;
    }
    .create{
        cursor: no-drop;
    }

</style>
text
