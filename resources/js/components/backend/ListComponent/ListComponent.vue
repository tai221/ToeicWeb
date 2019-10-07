<template>
    <div>
        <app-filter-bar></app-filter-bar>
        <app-table
            ref="table"
            :fields="fields"
            :list-api="listApi">
        </app-table>
    </div>
</template>

<script>
import Table from './Table'
import FilterBar from './FilterBar'
export default {
  name: 'ListComponent',
  components: {
    appTable: Table,
    appFilterBar: FilterBar
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
