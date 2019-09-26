import Vue from 'vue';
import Vuex from 'vuex';

import sidebar from "./modules/sidebar";
import resultSearch from "./modules/resultSearch";
import auth from "./modules/auth";
import notification from "./modules/notification";

Vue.use(Vuex);

export const store = new Vuex.Store({
    modules: {
        sidebar,
        resultSearch,
        auth,
        notification
    }
});
