<template>
    <div class="pag">
        <button @click="prevPage" :disabled="pageNumber == 0">{{ $t('pagination.previous') }}</button>
        <span>Page {{ pageNumber + 1 }} of {{ pageCount }}</span>
        <button @click="nextPage" :disabled="pageNumber >= pageCount-1">{{ $t('pagination.next') }}</button>
    </div>
</template>

<script>
export default {
  name: 'Pagination',
  data() {
    return {
      pageNumber: 0
    }
  },
  props: {
    listData: {
      type: Array,
      required: true
    },
    size: {
      type: Number,
      required: false,
      default: 10
    }
  },
  methods: {
    nextPage() {
      this.pageNumber++
      this.$emit('paginate', this.paginatedData)
    },
    prevPage() {
      this.pageNumber--
      this.$emit('paginate', this.paginatedData)
    }
  },
  computed: {
    pageCount() {
      const l = this.listData.length
      const s = this.size
      return Math.ceil(l / s)
    },
    paginatedData() {
      const start = this.pageNumber * this.size
      const end = start + this.size
      return this.listData.slice(start, end)
    }
  }
}
</script>

<style scoped>
    .pag{
        position:relative;
        margin-bottom: 100px;
    }
</style>
