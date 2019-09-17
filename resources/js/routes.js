import Report from "./components/backend/Report/Report";
import InfoAdmin from "./components/backend/InfoAdmin/InfoAdmin";
import Layout from "./components/backend/Layout";
import ManageAccount from "./components/backend/ManageAccount/ManageAccount";
import CreateAccount from "./components/backend/ManageAccount/CreateAccount";
import ResultSearch from "./components/backend/ManageAccount/ResultSearch";
import UserIndex from "./views/users/index"

export const routes = [
    {
        path: '/users',
        component: Layout,
        children:[
            {
                path:'',
                component: UserIndex
            }
         ]
    },{

    }
    // { path: '/manage-account', component: ManageAccount, name:'manageaccount'},
    // { path: '/manage-account/create', component: CreateAccount, name:'createaccount'},
    // { path: '/manage-account/edit/:id', component: CreateAccount, name:'editaccount'},
    // { path: '/manage-account/result', component: ResultSearch, name:'resultSearch'},
    // { path: '/list-report', component: Report },
    // { path: '/info-account', component: InfoAdmin }

    // {
    //     path: '/',
    //     component: Layout,
    //     name:'admin',
    //     children: [
    //         {
    //             path: 'manage-account',
    //             component: ManageAccount,
    //             name: 'manageaccount',
    //             children: [
    //                 {
    //                     path: 'create',
    //                     component: CreateAccount,
    //                     name: 'createaccount'
    //                 },
    //                 {
    //                     path: 'edit/:id',
    //                     component: CreateAccount,
    //                     name: 'editaccount'
    //                 },
    //                 {
    //                     path: 'result',
    //                     component: ResultSearch,
    //                     name: 'resultSearch'
    //                 }
    //             ]
    //         },
    //         {
    //             path: 'list-report',
    //             component: Report
    //         },
    //         {
    //             path: 'info-account',
    //             component: InfoAdmin
    //         }
    //
    //     ]
    // }
];
