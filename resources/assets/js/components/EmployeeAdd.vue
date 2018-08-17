<template>
  <div class="col-md-10 mt-5">
    <div class="row">
      <div class="col-md-10 mt-3">
        <h1>Mitarbeiter*in hinzufügen</h1>
      </div>
      <div class="col-md-2 mt-3">
        <router-link :to="{ name: 'EmployeeIndex' }" class="btn btn-block btn-light">&laquo; Zurück</router-link>
      </div>
    </div>
    <hr>
    
    <form>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="first_name">Vorname</label>
            <input class="form-control" type="text" name="first_name" placeholder="Vorname" v-model="employee.firstName">
          </div>
          <div class="form-group">
            <label for="last_name">Nachname</label>
            <input class="form-control" type="text" name="last_name" placeholder="Nachname" v-model="employee.lastName">
          </div>
          <div class="form-group">
            <label for="vacation_days">Jahresurlaub</label>
            <input class="form-control" type="number" min="0" name="vacation_days" v-model="employee.vacationDays">
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bereiche</h5>
              <hr>
              <template v-for="division in divisions">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <input type="checkbox" :name="division.id" :id="division.id" :value="division.id" v-model="checkedDivisions">
                    </div>
                  </div>
                  <input type="text" class="form-control" disabled :value="division.name">
                </div>
              </template>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-2 offset-10">
          <button @click.prevent="saveEmployee" class="btn btn-success btn-block">Speichern</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default{
  name: 'EmployeeAdd',
  data(){
    return{
      employee: {
        firstName: null,
        lastName: null,
        vacationDays: null,
        id: null
      },
      divisions: [],
      checkedDivisions: []
    }
  },
  methods: {
    fetchDivisions(){
      axios.get('/api/divisions', {
        headers: {
          Authorization: 'Bearer ' + localStorage.getItem('token')
        }
      }).then(response => {
        this.divisions = response.data.data
      }).catch(error => console.log(error))
    },
    saveEmployee(){
      this.addEmployeeToDatabase()
    },
    addEmployeeToDatabase(){
      axios({
        method: 'post',
        url: '/api/employees',
        headers: {
          Authorization: 'Bearer ' + localStorage.getItem('token')
        },
        data: {
          first_name: this.employee.firstName,
          last_name: this.employee.lastName,
          vacation_days: this.employee.vacationDays,
          divisions: this.checkedDivisions
        }
      })
        .then(response => {
          console.log(this.checkedDivisions)
          console.log(response.data.data)
        })
        .catch(error => console.log(error))
    },
    output(){
      console.log(this.employee.firstName)
      console.log(this.employee.lastName)
      console.log(this.employee.vacationDays)
      console.log(this.checkedDivisions)
    }
  },
  mounted(){
    this.fetchDivisions()
  }
}
</script>

<style scoped>
hr{
  margin-top: 0;
}
</style>
