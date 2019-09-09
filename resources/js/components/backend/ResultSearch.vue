<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'manageaccount'}" class="btn btn-info">Back</router-link>
        </div>
        <div>
            <h3>Result Search:</h3>
        </div>
        <div>
            <table class="table table-bordered" >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>
                </tr>
                </thead>
                <tbody v-for="userAccount, index in resultAccounts">
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
        </div>
    </div>

</template>

<script>
    import {mapGetters}  from 'vuex'
    export default {
        name: "ResultSearch",
        computed: {
            ...mapGetters({
                resultAccounts: 'resultAccounts'
            })
        },
        methods: {
            deleteAccount(id, index) {
                axios.delete('/api/v1/account/' + id)
                    .then(function (resp) {
                        app.resultAccounts.splice(index, 1);
                    })
                    .catch(function (resp) {
                        alert('could not delete account');
                    });
            },
            banAccount(id, index){
                var app = this;
                axios.get('/api/v1/account/' + id + '/edit')
                    .then(function (resp) {
                        app.resultAccounts[index].active = 0;
                    })
                    .catch(function (resp) {
                        alert('could not ban account')
                    });
            },
            unbanAccount(id, index){
                var app = this;
                axios.get('api/v1/account/' + id + '/edit')
                    .then(function (resp) {
                        app.resultAccounts[index].active = 1;
                    })
                    .catch(function (resp) {
                        alert('could not unban account')
                    });
            }
        }
    }
</script>

<style scoped>
    .ban{
        background-color: #B1A9A7;
    }
</style>
