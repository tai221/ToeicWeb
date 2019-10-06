<template>
    <app-table :fields="fields" :list-api="listApi" :delete-api="deleteApi"></app-table>
</template>

<script>
import Table from './Table'

export default {
  name: 'ListComponent',
  components: {
    appTable: Table
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
  }
}
</script>

<style scoped>

</style>
