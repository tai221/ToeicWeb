<template>
<div>
    <div class="panel panel-default">
        <div class="panel-body">
            <form v-on:submit="saveForm()">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label class="control-label">Title</label>
                        <input type="text" v-model="test.title" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label class="control-label">Audio</label>
                        <input  type="text" v-model="test.audio" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group" >
                        <button class="btn btn-success" >{{isEdit? 'Update':'Create'}}</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
</template>

<script>
import { getTest } from '../../api/manageTest'

export default {
  name: 'TestEdit',
  data() {
    return {
      test: {
        title: '',
        audio: ''
      },
      isEdit: false
    }
  },
  created() {
    const { id } = this.$route.params
    if (id) {
      this.isEdit = true
      getTest(id)
        .then((resp) => {
          this.test.title = resp.data.title
          this.test.audio = resp.data.audio
        })
        .catch(() => {
          alert('could not load data')
        })
    }
  },
  methods: {
    saveForm() {

    }
  }
}
</script>

<style scoped>

</style>
