<template>
  <div class="col-md-10 mt-5">
    <div class="row">
      <div class="col-md-10 mt-3">
        <h1>Bereiche</h1>
      </div>
      <div class="col-md-2 mt-3">
      </div>
    </div>
    <hr>

    <div class="row">
      <div class="col-md-10">
        <table class="table-hover table-borderless">
          <thead>
            <tr>
              <th>Bereich</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="division in divisions" :key="division.id">
              <td>{{ division.name }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    
  </div>
</template>

<script>
export default{
  name: 'DivisionIndex',
  data(){
    return{
      divisions: []
    }
  },
  methods: {
    fetchDivisions(){
      axios.get('/api/divisions', {
        headers: {
          Authorization: 'Bearer ' + localStorage.getItem('token')
        }
      })
        .then(response => {
          this.divisions = response.data.data
          console.log(response.data.data)
        })
        .catch(error => console.log(error))
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
