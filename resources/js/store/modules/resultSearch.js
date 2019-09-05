const state = {
    resultAccounts: []
}

const mutations = {
    'SET_RESULT_ACCOUNTS' (state, resultAccounts) {
        state.resultAccounts = resultAccounts;
    }
}

const actions = {
    setResultAccounts: ({commit}, resultAccounts) => {
        commit('SET_RESULT_ACCOUNTS', resultAccounts);
    }
}

const getters = {
    resultAccounts: state => {
        return state.resultAccounts;
    }
}

export default {
    state,
    mutations,
    actions,
    getters
}
