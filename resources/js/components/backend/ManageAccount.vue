<template>

    <div class="container">
        <h2>Quản lý tài khoản</h2>

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
                <td>{{userAccount.id}}</td>
                <td>{{userAccount.username}}</td>
                <td>{{userAccount.email}}</td>
                <td>{{userAccount.role}}</td>
            </tr>
            </tbody>
        </table>
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
            axios.get('xxx')
                .then(function (resp) {
                    app.userAccounts = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load userAccounts");
                });
        }
    }
</script>

<style scoped>

</style>
