// router.beforeEach((to, from, next) => {
//     if (to.matched.some(record => record.meta.requiresAuth)) {
//         if (!store.getters.loggedIn) {
//             next({
//                 name: 'login',
//             })
//         } else {
//             next()
//         }
//     } else if (to.matched.some(record => record.meta.requiresVisitor)) {
//         if (store.getters.loggedIn) {
//             next({
//                 name: 'userIndex',
//             })
//         } else {
//             next()
//         }
//     } else {
//         next()
//     }
// })


import {getToken} from "./utils/auth";
import {store} from "./store/store";
import router from './routes'

const whiteList = ['/login', '/reset-password'];

router.beforeEach((to, from, next) => {
    if (getToken()) {
        store.dispatch('getUserInfo')
            .then(response => {
                if (to.path === '/login') {
                    next({
                        name: 'userIndex'
                    })
                } else {
                    next()
                }
            })
            .catch(error => {
                if (to.path === '/login') {
                    next()
                } else {
                    next({
                        name: 'login'
                    })
                }
            })
    } else {
        if (whiteList.indexOf(to.path) !== -1) {
            next()
        } else {
            next({
                name: 'login'
            })
        }
    }
})
