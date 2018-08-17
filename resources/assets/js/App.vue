<template>
  <div class="app-wrapper">
    <navbar></navbar>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2 d-none d-md-block bg-light sidebar">
          <sidebar></sidebar>
        </div>
        <div class="col-md-10 offset-2">
          <router-view></router-view>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import navbar from './components/Navbar'
import sidebar from './components/Sidebar'

export default{
  name: 'App',
  components: {
    navbar,
    sidebar
  },
  data(){
    return{

    }
  }
}
</script>

<style>

</style>

