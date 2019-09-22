import Report from "./components/backend/Report/Report";
import InfoAdmin from "./components/backend/InfoAdmin/InfoAdmin";
import Layout from "./components/backend/Layout";
import ManageAccount from "./components/backend/ManageAccount/ManageAccount";
import CreateAccount from "./components/backend/ManageAccount/CreateAccount";
import ResultSearch from "./components/backend/ManageAccount/ResultSearch";
import UserIndex from "./views/users/index";
import Login from "./views/Login/Login";

export const routes = [
    {
        path: '/admin',
        component: Layout,
        children:[
            {
                path: '',
                component: UserIndex,
                name: 'userIndex',
                meta: {
                    requiresAuth: true
                }
            },
            {
                path: 'manage-account',
                component: ManageAccount,
                name:'manageaccount',
                meta:{
                    requiresAuth: true
                }
            },
            {
                path: 'manage-account/create',
                component: CreateAccount,
                name:'createaccount',
                meta:{
                    requiresAuth: true
                }
            },
            {
                path: 'manage-account/edit/:id',
                component: CreateAccount,
                name:'editaccount',
                meta: {
                    requiresAuth: true
                }
            },
            {
                path: 'manage-account/result',
                component: ResultSearch,
                name:'resultSearch',
                meta: {
                    requiresAuth: true
                }
            }

         ]
    },{
        path:'/login',
        component: Login,
        name: 'login',
        meta: {
            requiresVisitor: true
        }
     }
    // ,{
    //     path:'/account',
    //     component: Layout,
    //     children:[
    //         {
    //             path: '/manage-account',
    //             component: ManageAccount,
    //             name:'manageaccount',
    //             meta:{
    //                 requiresAuth: true
    //             }
    //         },
    //         {
    //             path: '/manage-account/create',
    //             component: CreateAccount,
    //             name:'createaccount',
    //             meta:{
    //                 requiresAuth: true
    //             }
    //         },
    //     ]
    // }
    // { path: '/manage-account', component: ManageAccount, name:'manageaccount'},
    // { path: '/manage-account/create', component: CreateAccount, name:'createaccount'},
    // { path: '/manage-account/edit/:id', component: CreateAccount, name:'editaccount'},
    // { path: '/manage-account/result', component: ResultSearch, name:'resultSearch'},
    // { path: '/list-report', component: Report },
    // { path: '/info-account', component: InfoAdmin }

];
