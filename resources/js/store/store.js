import Vue from 'vue';
import Vuex from 'vuex';

import sidebar from "./modules/sidebar";
import resultSearch from "./modules/resultSearch";

Vue.use(Vuex);

export const store = new Vuex.Store({
    modules: {
        sidebar,
        resultSearch
    }
});
