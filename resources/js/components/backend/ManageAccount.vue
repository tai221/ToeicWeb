<template>
<div>
        <div>
            <span class="qltk">Quản lý tài khoản</span>
            <div class="form-group">
                <router-link :to="{name: 'createaccount'}" class="btn btn-primary">Create</router-link>
            </div>
        </div>


        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
            </thead>
            <tbody v-for="userAccount, index in userAccounts">
            <tr v-bind:class="{ban: status(userAccount.active)}">
                <td>{{ userAccount.id }}</td>
                <td>{{ userAccount.username }}</td>
                <td>{{ userAccount.email }}</td>
                <td>{{ userAccount.hasRole }}</td>
                <td>
                    <a href="#"
                       class="btn btn-sm btn-danger"
                       v-on:click="deleteAccount(userAccount.id, index)">
                        Delete
                    </a>

                    <a href="#"
                       class="btn btn-sm btn-warning"
                       v-on:click="banAccount(userAccount.id, index)">
                        Ban
                    </a>
                </td>

            </tr>
            </tbody>
        </table>
    <router-view></router-view>
</div>
</template>

<script>
    export default {
        name: "ManageAccount",
        data() {
            return {
                userAccounts:[]
            }
        },
        created() {
            var app = this;
            axios.get('/api/v1/account')
                .then(function (resp) {
                    app.userAccounts = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load accounts");
                });
        },
        computed: {
            status(userAccount.active) {
                if(userAccount.active == 1) {
                    return false;
                } else {
                    return true;
                }
            }
        },
        methods: {
            deleteAccount(id, index) {
                var app = this;
                console.log(id);
                axios.delete('/api/v1/account/' + id)
                    .then(function (resp) {
                        app.userAccounts.splice(index, 1);
                    })
                    .catch(function (resp) {
                        alert('could not delete account');
                    });
            },
            banAccount(id, index){
                var app = this;
                console.log(id);
                axios.get('/api/v1/account/' + id + '/edit')
                    .then(function (resp) {
                        app.userAccounts
                    })
                    .catch(function (resp) {
                        alert('could not ban account')
                    });
            }
        }
    }
</script>

<style scoped>
    .qltk{
        font-size: 20px;
        font-family: "Nunito", sans-serif;
    }
    .ban{
        background-color: #0b5a0e;
    }
</style>
