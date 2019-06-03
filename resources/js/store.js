import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
      loading: {
          title: '',
          active: false,
          color: 'primary',
      },
      showSearch: false,
      showForm: false,
      headerWindow: {
          title: 'Título',
          subTitle: 'Sub Título',
          icon: 'edit',
          color: 'primary'
      }
  },
  mutations: {
      setheaderWindow(state, payload){
          state.headerWindow.title = payload.title
          state.headerWindow.subTitle = payload.subTitle
          state.headerWindow.color = payload.color
          state.headerWindow.icon = payload.icon
      },
      showLoading(state, payload){
          state.loading.title = payload.title
          state.loading.color = payload.color
          state.loading.active = true
      },
      hideLoading(state){
          state.loading.active = false
          state.loading.title = ''
      },
      changeSearch(state){
          state.showSearch = !state.showSearch
      },
      changeForm(state){
          state.showForm = !state.showForm
      }
  },
  actions: {

  }
})