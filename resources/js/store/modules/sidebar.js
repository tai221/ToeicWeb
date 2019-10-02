const state = {
  sidebar: true
}

const mutations = {
  changeStateSidebar: (state) => state.sidebar = !state.sidebar
}

const actions = {
  changeStateSidebar: ({ commit }) => {
    commit('changeStateSidebar')
  }
}

const getters = {
  stateSidebar: (state) => state.sidebar
}

export default {
  state,
  mutations,
  actions,
  getters
}
