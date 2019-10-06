<template>
    <ListComponent :fields="fields" :list-api="getAllAccount" :delete-api="deleteAccount"></ListComponent>
</template>

<script>
import ListComponent from '../../components/backend/ListComponent/ListComponent'
import {getAllAccount, deleteAccount} from '../../api/managAccount'

export default {
  name: 'TestList',
  components: {
    ListComponent
  },
  data() {
    return {
      getAllAccount,
      deleteAccount,
      fields: [
        {
          name: 'id',
          title: 'ID'
        },
        {
          name: 'username',
          title: 'Username'
        },
        {
          name: 'email',
          title: 'Email'
        },
        {
          name: 'hasRole',
          title: 'Role'
        }
      ]
    }
  }

}
</script>

<style scoped>

</style>
