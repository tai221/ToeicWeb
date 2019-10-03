import Cookies from 'js-cookie'

const state = {
  language: Cookies.get('language') || 'en'
}

const mutations = {
  SET_LANGUAGE: (state, language) => {
    state.language = language
    Cookies.set('language', language)
  }
}

const actions = {
  setLanguage({ commit }, language) {
    commit('SET_LANGUAGE', language)
  }
}

const getters = {
  language: (state) => state.app.language
}

export default {
  state,
  mutations,
  actions,
  getters
}
