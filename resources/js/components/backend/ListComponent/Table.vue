<template>
    <div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th v-for="field in fields" v-if="field.title != ''">{{field.title}}</th>
                <th></th>
            </tr>
            </thead>
            <tbody v-for="data, index in partOfDatas">
            <tr>
                <td v-for="field, i in fields" :key="i" v-if="field.title != ''">{{data[field.name]}}</td>
                <td>
                    <action-column :row-data="data" :row-index="index"></action-column>
                </td>
            </tr>
            </tbody>
        </table>
        <pagination :list-data="datas" @paginate="partOfDatas = $event"></pagination>
    </div>
</template>

<script>
    import ActionColumn from './ActionColumn'
    import Pagination from '../Pagination/Pagination'
export default {
  name: 'Table',
  components: {
    ActionColumn,
    Pagination
  },
  data() {
    return {
      datas: [],
      partOfDatas: []
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
    }
  },
  created() {
    this.listApi()
      .then((resp) => {
        this.datas = resp.data
        if (this.datas.length > 10) {
          this.partOfDatas = this.datas.slice(0, 10)
        } else {
          this.partOfDatas = this.datas
        }
      })
      .catch((resp) => {
        alert('Could not load data')
      })
  },
  methods: {
    // deleteRow(id, index) {
    //   this.deleteApi(id)
    //     .then((resp) => {
    //       this.datas.splice(index, 1)
    //     })
    // }
  }

}
</script>

<style scoped>
 .table{
     margin-top: 20px;
 }
</style>
