<template>
    <div class="pag">
        <button @click="prevPage" :disabled="pageNumber == 0">{{ $t('pagination.previous') }}</button>
        <button v-for="page of pageCount"
                @click="toPage(page)"
                :class="{'base-pagination__description--current':pageNumber === page-1}">
                {{page}}
        </button>

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
    },
    toPage(page) {
      this.pageNumber = page - 1
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
    .base-pagination__description--current{
        background-color: #0b5a0e;
    }
</style>
