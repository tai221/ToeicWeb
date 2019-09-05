const state = {
    sidebar: true
}

const mutations = {
    changeStateSidebar: state => {
        return state.sidebar = !state.sidebar;
    }
}

const actions = {
    changeStateSidebar: ({commit}) => {
        commit('changeStateSidebar');
    }
}

const getters = {
    stateSidebar: state => {
        return state.sidebar;
    }
}

export default {
    state,
    mutations,
    actions,
    getters
}
