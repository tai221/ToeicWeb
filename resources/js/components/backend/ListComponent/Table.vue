<template>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th v-for="field in fields" v-if="field.title != ''">{{field.title}}</th>
        </tr>
        </thead>
        <tbody v-for="data, index in datas">
        <tr>
            <td v-for="field, i in fields" :key="i" v-if="field.title != ''">{{data[field.name]}}</td>
            <td >
                <action-column :row-data="data" :row-index="index"></action-column>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    import ActionColumn from './ActionColumn'
export default {
  name: 'Table',
  components: {
    ActionColumn
  },
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

</style>
