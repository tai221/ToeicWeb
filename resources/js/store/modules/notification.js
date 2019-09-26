const state = {
    notifications: []
}

const mutations = {
    'SET_NOTIFICATIONS' (state, notifications) {
        state.notifications = notifications;
    },
    DELETE_NOTIFICATIONS(state){
        state.notifications = [];
    }
}

const actions = {
    updateNotifications: ({commit}, notifications) => {
        commit('SET_NOTIFICATIONS', notifications);
    },
    deleteNotifications:({commit}) =>{
        commit('DELETE_NOTIFICATIONS');
    }
}

const getters = {
    notifications: state => {
        return state.notifications;
    }
}

export default {
    state,
    mutations,
    actions,
    getters
}
