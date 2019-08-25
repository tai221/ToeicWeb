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
            <tbody v-for="userAccount in userAccounts">
            <tr>
                <td>{{ userAccount.id }}</td>
                <td>{{ userAccount.username }}</td>
                <td>{{ userAccount.email }}</td>
                <td>{{ userAccount.hasRole }}</td>
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
        }
    }
</script>

<style scoped>
    .qltk{
        font-size: 20px;
        font-family: "Nunito", sans-serif;
    }
</style>
