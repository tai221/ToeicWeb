<template>
<div>
        <div>
            <span class="qltk">Manage account</span>
            <div class="row ">
                <div class="form-group col-1">
                    <router-link :to="{name: 'createaccount'}" class="btn btn-primary">Create</router-link>
                </div>
                <div class="search-container col-4">
                    <form v-on:submit="search()">
                        <input type="text" placeholder="Search by username" v-model="inputSearch">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>


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
            <tbody v-for="userAccount, index in partOfAccounts">
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
        <app-pagination :list-data="userAccounts" @paginate="partOfAccounts = $event"></app-pagination>

    <router-view></router-view>
</div>
</template>

<script>
    import Pagination from "../Pagination/Pagination";
    import {getAllAccount, deleteAccount, banAccount, unbanAccount, searchAccount} from "../../../api/managAccount";

    export default {
        name: "ManageAccount",
        data() {
            return {
                userAccounts:[],
                partOfAccounts:[],
                inputSearch:''
            }
        },
        components:{
            appPagination: Pagination
        },
        created() {
            var app = this;
            console.log('created manage account')
            getAllAccount()
                .then(function (resp) {
                    app.userAccounts = resp.data;
                    if(app.userAccounts.length > 10){
                        app.partOfAccounts = app.userAccounts.slice(0,10);
                    }else{
                        app.partOfAccounts = app.userAccounts;
                    }
                })
                .catch(function (resp) {
                    alert("Could not load accounts");
                });
        },
        computed: {

        },
        methods: {
            deleteAccount(id, index) {
                var app = this;
                deleteAccount(id)
                    .then(function (resp) {
                        app.userAccounts.splice(index, 1);
                    })
                    .catch(function (resp) {
                        alert('could not delete account');
                    });
            },
            banAccount(id, index){
                var app = this;
                banAccount(id)
                    .then(function (resp) {
                        app.userAccounts[index].active = 0;
                    })
                    .catch(function (resp) {
                        alert('could not ban account')
                    });
            },
            unbanAccount(id, index){
                var app = this;
                unbanAccount(id)
                    .then(function (resp) {
                        app.userAccounts[index].active = 1;
                    })
                    .catch(function (resp) {
                        alert('could not unban account')
                    });
            },
            search(){
                event.preventDefault();
                var app = this;
                var inputSearch = app.inputSearch;
                var data = {'inputSearch': inputSearch};
                searchAccount(data)
                    .then(function (resp) {
                        app.$store.dispatch('setResultAccounts', resp.data);
                        app.$router.push({name:'resultSearch'});
                    })
                    .catch(function (resp) {
                        console.log("xay ra loi gui ket qua")
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
