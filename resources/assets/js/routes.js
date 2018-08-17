import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './store'

Vue.use(VueRouter)

import LoginComponent from './components/LoginComponent'
import LogoutComponent from './components/LogoutComponent'
import DivisionIndex from './components/DivisionIndex'
import EmployeeIndex from './components/EmployeeIndex'
import EmployeeAdd from './components/EmployeeAdd'

const routes = [
  {
    path: '/',
    redirect: { name: 'login' }
  },
  {
    path: '/employees',
    name: 'EmployeeIndex',
    component: EmployeeIndex,
    meta: { requiresAuth: true }
  },
  {
    path: '/login',
    name: 'login',
    component: LoginComponent
  },
  {
    path: '/logout',
    name: 'logout',
    component: LogoutComponent
  },
  {
    path: '/employees/add',
    name: 'EmployeeAdd',
    component: EmployeeAdd
  },
  {
    path: '/divisions',
    name: 'DivisionIndex',
    component: DivisionIndex
  }
]

const router = new VueRouter({
  routes
})

router.beforeEach((to, from, next) => {

    // check if the route requires authentication and user is not logged in
    if (to.matched.some(route => route.meta.requiresAuth) && !store.state.isLoggedIn) {
        // redirect to login page
        next({ name: 'login' })
        return
    }

    // if logged in redirect to dashboard
    if(to.path === '/login' && store.state.isLoggedIn) {
        next({ name: 'EmployeeIndex' })
        return
    }

    next()
})

export default router
