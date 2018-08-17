<template>
  <div class="col-md-10 col-md-offset-2 mt-5">

    <div class="employee-index">
      <!-- Component Header -->
      <div class="row">
        <!-- Title -->
        <div class="col-md-10 mt-3">
          <h1 class="mr-auto">
            <i class="fas fa-users"></i>
            Mitarbeiter*innen
          </h1>
        </div>
        <!-- Action-slot -->
        <div class="col-md-2 mt-3">
          <router-link :to="{ name: 'EmployeeAdd' }" class="btn btn-block btn-success">Hinzufügen</router-link>
        </div>
      </div>
      <hr>

      <!-- Component Body -->
      <div class="row">
        <div class="col-md-12">
          <table class="table table-borderless table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Bereiche</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="employee in employees" :key="employee.id" @click="openModal(employee)">
                <td>{{ employee.last_name }}, {{ employee.first_name }}</td>
                <td>
                  <template v-for="division in employee.divisions">
                    <span class="badge badge-pill badge-secondary">{{ division.name }}</span>
                    <span> </span>
                  </template>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <!-- <EmployeeModal v-if="showModal" @closeModalEvent="closeModal"> -->
    <EmployeeModal v-if="showModal" @close-modal-event="closeModal">
      <h5 class="modal-title" slot="title">{{ selectedEmployee.last_name }}, {{ selectedEmployee.first_name }}</h5>
      <EmployeeModalMenu v-bind:employee="selectedEmployee"></EmployeeModalMenu>
    </EmployeeModal>

  </div>
</template>

<script>
import EmployeeModal from './EmployeeModal.vue'
import EmployeeModalMenu from './EmployeeModalMenu.vue'

export default{
  name: 'dashboard',
  components: {
    EmployeeModal,
    EmployeeModalMenu
  },
  data(){
    return{
      employees: null,
      showModal: false,
      selectedEmployee: {}
    }
  },
  methods: {
    openModal(employeeObj){
      this.showModal = true
      this.selectedEmployee = employeeObj
    },
    closeModal(){
      this.showModal = false
      this.selectedEmployee = null
    }
  },
  mounted(){
    axios.get('/api/employees', {
      headers: {
        Authorization: 'Bearer ' + localStorage.getItem('token')
      }
    }).then(response => {
      this.employees = response.data.data
    }).catch(error => {
      console.log(error)
    })
  }
}
</script>

<style scoped>
hr{
  margin-top: 0;
}
tbody tr:hover{
  cursor: pointer;
}
</style>
