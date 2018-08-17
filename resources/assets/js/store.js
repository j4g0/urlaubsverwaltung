import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    isLoggedIn: !!localStorage.getItem('token'),
    showModal = false
  },
  mutations: {
    loginUser (state) {
      state.isLoggedIn = true
    },
    logoutUser (state) {
      state.isLoggedIn = false
    },
    toggleModal (showModal) {
      state.showModal = !state.showModal
    }
  }
})
