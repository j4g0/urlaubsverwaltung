<template>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <router-link to="/" class="navbar-brand col-sm3 col-md2 ml-2">Urlaubsverwaltung</router-link>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <router-link :to="{ name: 'logout' }" class="nav-link">Ausloggen</router-link>
      </li>
    </ul>
  </nav>
</template>

<script>
import router from '../routes'

export default{
  name: 'navbar',
  components: {
    router
  },
  data(){
    return{

    }
  }
}
</script>

<style scoped>

.navbar-brand {
  padding-top: .75rem;
  padding-bottom: .75rem;
  font-size: 1rem;
  background-color: rgba(0, 0, 0, .25);
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
}
</style>

