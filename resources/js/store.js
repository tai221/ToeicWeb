import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state:{
        sidebar: true,
    },
    getters:{
        stateSidebar: state => {
            return state.sidebar;
        }
    },
    mutations:{
        changeStateSidebar: state => {
            return state.sidebar = !state.sidebar;
        }
    },
    actions:{
        changeStateSidebar: ({commit}) => {
            commit('changeStateSidebar');
        }
    }
});
