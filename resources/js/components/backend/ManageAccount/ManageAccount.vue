<template>
<div>
        <div>
            <span class="qltk">{{ $t('manageAccount.manage') }}</span>
            <div class="row ">
                <div class="form-group col-2">
                    <router-link :to="{name: 'createaccount'}" class="btn btn-primary">{{ $t('manageAccount.create') }}</router-link>
                </div>
                <div class="search-container col-7">
                    <form v-on:submit="search()">
                        <div class="row">
                            <input type="text" :placeholder="$t('manageAccount.searchBy')" v-model="inputSearch">
                            <span class="input-group-btn">
                                <button class="btn-sm btn-search" type="button"><i class="fa fa-search fa-fw"></i> {{ $t('manageAccount.search') }}</button>
                            </span>
                        </div>
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
                        <a
href="#"
                           class="btn btn-sm btn-danger"
                           v-on:click="deleteAccount(userAccount.id, index)">
                            Delete
                        </a>

                        <a
href="#"
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
                        <a
href="#"
                           class="btn btn-sm btn-danger"
                           v-on:click="deleteAccount(userAccount.id, index)">
                            Delete
                        </a>

                        <a
href="#"
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
import Pagination from '../Pagination/Pagination'
import {
  getAllAccount, deleteAccount, banAccount, unbanAccount, searchAccount
} from '../../../api/managAccount'

export default {
  name: 'ManageAccount',
  data() {
    return {
      userAccounts: [],
      partOfAccounts: [],
      inputSearch: ''
    }
  },
  components: {
    appPagination: Pagination
  },
  created() {
    const app = this
    console.log('created manage account')
    getAllAccount()
      .then((resp) => {
        app.userAccounts = resp.data
        if (app.userAccounts.length > 10) {
          app.partOfAccounts = app.userAccounts.slice(0, 10)
        } else {
          app.partOfAccounts = app.userAccounts
        }
      })
      .catch((resp) => {
        alert('Could not load accounts')
      })
  },
  computed: {

  },
  methods: {
    deleteAccount(id, index) {
      const app = this
      deleteAccount(id)
        .then((resp) => {
          app.userAccounts.splice(index, 1)
        })
        .catch((resp) => {
          alert('could not delete account')
        })
    },
    banAccount(id, index) {
      const app = this
      banAccount(id)
        .then((resp) => {
          app.userAccounts[index].active = 0
        })
        .catch((resp) => {
          alert('could not ban account')
        })
    },
    unbanAccount(id, index) {
      const app = this
      unbanAccount(id)
        .then((resp) => {
          app.userAccounts[index].active = 1
        })
        .catch((resp) => {
          alert('could not unban account')
        })
    },
    search() {
      event.preventDefault()
      const app = this
      const { inputSearch } = app
      const data = { inputSearch }
      searchAccount(data)
        .then((resp) => {
          app.$store.dispatch('setResultAccounts', resp.data)
          app.$router.push({ name: 'resultSearch' })
        })
        .catch((resp) => {
          console.log('xay ra loi gui ket qua')
        })
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
    input[type=text] {
        background-color: #f6f6f6;
        color: #0d0d0d;
        /*padding: 15px 32px;*/
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 5px;
        width: 30%;
        border: 2px solid #f6f6f6;
        border-color: #1b1e21;
        /*-webkit-transition: all 0.5s ease-in-out;*/
        /*-moz-transition: all 0.5s ease-in-out;*/
        /*-ms-transition: all 0.5s ease-in-out;*/
        /*-o-transition: all 0.5s ease-in-out;*/
        /*transition: all 0.5s ease-in-out;*/
        -webkit-border-radius: 5px 5px 5px 5px;
        border-radius: 5px 5px 5px 5px;
    }

    .btn-search {
        background: #3948b2;
        border-radius: 5px;
        color: #fff;
        border-width: 1px;
        border-style: solid;
        border-color: #1c1c1c;
        display: inline-block;
        margin-top: 7px;
        margin-letf: 0px;
    }
    .btn-search:link, .btn-search:visited {
        color: #fff;
    }
    .btn-search:active, .btn-search:hover {
        background: #1c1c1c;
        color: #fff;
    }
</style>
