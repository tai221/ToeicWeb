<template>
    <table class="table table-bordered" ref="vuetable">
        <thead>
        <tr>
            <th v-for="field in fields">{{field.title}}</th>
            <th></th>
        </tr>
        </thead>
        <tbody v-for="data, index in datas">
<!--        <tr v-if="userAccount.active == 1">-->
        <tr>
            <td v-for="field, i in fields" :key="i">{{data[field.name]}}</td>
            <td v-if="deleteApi">
                <a
                    href="#"
                    class="btn btn-sm btn-danger"
                    v-on:click="deleteRow(data.id, index)">
                    Delete
                </a>
            </td>
        </tr>

<!--                <router-link :to="{name: 'editaccount', params: {id: userAccount.id}}" class="btn btn-sm btn-info">Update</router-link>-->
<!--                <a-->
<!--                    href="#"-->
<!--                    class="btn btn-sm btn-danger"-->
<!--                    v-on:click="deleteAccount(userAccount.id, index)">-->
<!--                    Delete-->
<!--                </a>-->

<!--                <a-->
<!--                    href="#"-->
<!--                    class="btn btn-sm btn-warning"-->
<!--                    v-on:click="banAccount(userAccount.id, index)">-->
<!--                    Ban-->
<!--                </a>-->
<!--            </td>-->

<!--        </tr>-->
<!--        <tr v-else class="ban">-->

<!--            <td>{{ userAccount.id }}</td>-->
<!--            <td>{{ userAccount.username }}</td>-->
<!--            <td>{{ userAccount.email }}</td>-->
<!--            <td>{{ userAccount.hasRole }}</td>-->
<!--            <td>-->
<!--                <router-link :to="{name: 'editaccount', params: {id: userAccount.id}}" class="btn btn-sm btn-info">Update</router-link>-->
<!--                <a-->
<!--                    href="#"-->
<!--                    class="btn btn-sm btn-danger"-->
<!--                    v-on:click="deleteAccount(userAccount.id, index)">-->
<!--                    Delete-->
<!--                </a>-->

<!--                <a-->
<!--                    href="#"-->
<!--                    class="btn btn-sm btn-warning"-->
<!--                    v-on:click="unbanAccount(userAccount.id, index)">-->
<!--                    Unban-->
<!--                </a>-->
<!--            </td>-->

<!--        </tr>-->

        </tbody>
    </table>
</template>

<script>
  import Vue from 'vue'
export default {
  name: 'Table',
  data() {
    return {
      datas: []
    }
  },
  props: {
    fields: {
      type: Array,
      required: true
    },
    listApi: {
      type: Function,
      required: true
    },
    deleteApi: {
      type: Function,
      default: null
    }
  },
  created() {
    this.listApi()
      .then((resp) => {
        this.datas = resp.data
        console.log(this.datas)
      })
      .catch((resp) => {
        alert('Could not load data')
      })
  },
  methods: {
    deleteRow(id, index) {
      this.deleteApi(id)
        .then((resp) => {
          this.datas.splice(index, 1)
        })
    }
  }

}
</script>

<style scoped>

</style>
