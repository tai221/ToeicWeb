import {login, logout} from "../../api/auth";

const state = {
    token: localStorage.getItem('access_token')||null,
    username: localStorage.getItem('username')|| null,

}

const mutations = {
    retrieveToken(state, token){
        state.token = token;
    },
    destroyToken(state){
        state.token = null;
    },
    setUsername(state, username){
        state.username = username;
    },
    deleteUsername(state){
        state.username = null;
    }
}

const actions = {
    retrieveToken(context, account) {
        return new Promise((resolve, reject) => {
            console.log(account)
            login(account)
                .then(response => {
                    let token = response.data.access_token;
                    localStorage.setItem('access_token', token);
                    localStorage.setItem('username', account.username);
                    // document.cookie= username + "=" + account.username() + ";"
                    context.commit('retrieveToken',token);
                    context.commit('setUsername',account.username);
                    resolve(response)

                })
                .catch(error => {
                    console.log(error);
                    reject(error)
                })
        })

    },
    destroyToken(context) {
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token
        return new Promise((resolve, reject) => {
            logout()
                .then(response => {
                    localStorage.removeItem('access_token');
                    localStorage.removeItem('username');
                    context.commit('destroyToken');
                    context.commit('deleteUsername');
                    resolve(response);
                })
                .catch(error => {
                    localStorage.removeItem('access_token');
                    context.commit('destroyToken');
                    context.commit('deleteUsername');
                    reject(error);
                })
        })
    }

}

const getters = {
    loggedIn(state){
        return state.token !== null
    },
    username(state){
        return state.username ;
    }
}

export default {
    state,
    mutations,
    actions,
    getters
}
