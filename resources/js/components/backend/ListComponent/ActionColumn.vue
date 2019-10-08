<template>
    <div>
        <RouterLink :to="{path: String(rowData.id)}">
            <a
                href="#"
                class="btn btn-sm btn-warning">
                Edit
            </a>
        </RouterLink>
        <a
            v-if="$parent.$parent.deleteApi"
            @click="handleDelete"
            href="#"
            class="btn btn-sm btn-danger">
            Delete
        </a>
    </div>
</template>

<script>
export default {
  name: 'ActionColumn',
  props: {
    rowData: {
      type: Object,
      required: true
    },
    rowIndex: {
      type: Number,
      default: 0
    }
  },
  methods: {
    handleDelete() {
      const id = this.rowData.id
      const data = {
        id
      }
      console.log(data)
      this.$parent.$parent.deleteApi(data)
        .then(resp => {
          this.$parent.partOfDatas.splice(this.rowIndex, 1)
          // this.$parent.$refs.vuetable.reload()

        })
    }
  }
}
</script>

<style scoped>

</style>
