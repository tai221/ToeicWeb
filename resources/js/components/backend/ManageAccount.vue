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
                <th></th>
            </tr>
            </thead>
            <tbody v-for="userAccount, index in userAccounts">
            <tr v-if="userAccount.active == 1">

                    <td>{{ userAccount.id }}</td>
                    <td>{{ userAccount.username }}</td>
                    <td>{{ userAccount.email }}</td>
                    <td>{{ userAccount.hasRole }}</td>
                    <td>
                        <router-link :to="{name: 'editaccount', params: {id: userAccount.id}}" class="btn btn-sm btn-info">Update</router-link>
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
            <tr v-else class="ban">

                    <td>{{ userAccount.id }}</td>
                    <td>{{ userAccount.username }}</td>
                    <td>{{ userAccount.email }}</td>
                    <td>{{ userAccount.hasRole }}</td>
                    <td>
                        <router-link :to="{name: 'editaccount', params: {id: userAccount.id}}" class="btn btn-sm btn-info">Update</router-link>
                        <a href="#"
                           class="btn btn-sm btn-danger"
                           v-on:click="deleteAccount(userAccount.id, index)">
                            Delete
                        </a>

                        <a href="#"
                           class="btn btn-sm btn-warning"
                           v-on:click="unbanAccount(userAccount.id, index)">
                            Unban
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
                        app.userAccounts[index].active = 0;
                    })
                    .catch(function (resp) {
                        alert('could not ban account')
                    });
            },
            unbanAccount(id, index){
                var app = this;
                axios.get('api/v1/account/' + id + '/edit')
                    .then(function (resp) {
                        app.userAccounts[index].active = 1;
                    })
                    .catch(function (resp) {
                        alert('could not unban account')
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
        background-color: #B1A9A7;
    }
</style>
