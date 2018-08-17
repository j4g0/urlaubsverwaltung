<template>
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky container">
        <ul class="nav flex-column">
          <h6 class="mt-2">Angestellte</h6>
          <li class="nav-item">
            <router-link to="/" class="nav-link">Übersicht</router-link>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Urlaubskonten</a>
          </li>
          <h6 class="mt-3">Abwesenheiten</h6>
          <li class="nav-item">
            <a class="nav-link" href="">Kalenderansicht</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Listenansicht</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Hinzufügen</a>
          </li>
          <h6 class="mt-3">Bereiche</h6>
          <li class="nav-item">
            <router-link :to="{ name: 'DivisionIndex' }" class="nav-link">Übersicht</router-link>
          </li>
        </ul>
      </div>
    </nav>
</template>

<script>
import router from '../routes'

export default{
  name: 'sidebar',
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
h6{
  font-weight: bold;
}
a:hover{
  position: relative;
  right: -2px;
}
.sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  z-index: 100; /* Behind the navbar */
  padding: 48px 0 0; /* Height of navbar */
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
}

.sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: .5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}

@supports ((position: -webkit-sticky) or (position: sticky)) {
  .sidebar-sticky {
    position: -webkit-sticky;
    position: sticky;
  }
}

.sidebar .nav-link {
  font-weight: 500;
  color: #333;
}

.sidebar .nav-link.active {
  color: #007bff;
}
</style>
