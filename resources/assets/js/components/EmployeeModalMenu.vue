<template>
  <div class="row">
    <div class="col-md-6">
      <button class="btn btn-dark btn-block" @click="editEmployee">
        <i class="fas fa-user-edit"></i>
        Bearbeiten
      </button>
    </div>
    <div class="col-md-6">
      <button class="btn btn-danger btn-block" @click="deleteEmployee">
        <i class="fas fa-user-minus"></i>
        Löschen
      </button>
    </div>
  </div>
</template>

<script>
export default{
  name: 'EmployeeModalMenu',
  props: ['employee'],
  data(){
    return{

    }
  },
  methods: {
    editEmployee(){

    },
    deleteEmployee(){
      axios({
        method: 'delete',
        url: '/api/employees/' + this.employee.id,
        headers: {
          Authorization: 'Bearer ' + localStorage.getItem('token')
        },
      })
        .then(response => {
          this.$emit('close-modal-event')
        })
        .catch(error => console.log(error))
    }
  }
}
</script>

<style>

</style>
