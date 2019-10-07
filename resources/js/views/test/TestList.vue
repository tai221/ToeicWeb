<template>
    <ListComponent :fields="fields" :list-api="getAllTest" :delete-api="deleteTest"></ListComponent>
</template>

<script>
import ListComponent from '../../components/backend/ListComponent/ListComponent'
import {getAllTest, deleteTest} from '../../api/manageTest'

export default {
  name: 'TestList',
  components: {
    ListComponent
  },
  data() {
    return {
      getAllTest,
      deleteTest,
      fields: [
        {
          name: 'id',
          title: 'ID'
        },
        {
          name: 'title',
          title: 'Title'
        },
        {
          name: 'accessCount',
          title: 'Count access'
        },
        {
          name: 'audio',
          title: 'Audio'
        },
        {
          name: '__component:action-column',
          title: ''
        }
      ]
    }
  }

}
</script>

<style scoped>

</style>
