<template>

</template>

<script>
import store from '../store'

export default{
  name: 'logout',
  data(){
    return{

    }
  },
  mounted(){
    localStorage.removeItem('token')
    store.commit('logoutUser')
    this.$router.push({ name: 'login' })
  }
}
</script>

<style>

</style>

