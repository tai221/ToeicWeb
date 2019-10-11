import Vue from 'vue'
import Router from 'vue-router'
import Report from './components/backend/Report/Report'
import InfoAdmin from './components/backend/InfoAdmin/InfoAdmin'
import Layout from './components/backend/Layout'
import ManageAccount from './components/backend/ManageAccount/ManageAccount'
import CreateAccount from './components/backend/ManageAccount/CreateAccount'
import ResultSearch from './components/backend/ManageAccount/ResultSearch'
import UserIndex from './views/users/index'
import Login from './views/Login/Login'
import InputEmail from './views/ResetPassword/InputEmail'
import TestList from './views/test/TestList'
import TestEdit from './views/test/TestEdit'
import Register from './views/Register/Register'

Vue.use(Router)

export const routes = [
  {
    path: '/admin',
    component: Layout,
    children: [
      {
        path: '',
        component: UserIndex,
        name: 'userIndex'
      },
      {
        path: 'manage-account',
        component: ManageAccount,
        name: 'manageaccount'
      },
      {
        path: 'manage-account/create',
        component: CreateAccount,
        name: 'createaccount',
        meta: {
          requiresAuth: true
        }
      },
      {
        path: 'manage-account/edit/:id',
        component: CreateAccount,
        name: 'editaccount'
      },
      {
        path: 'manage-account/result',
        component: ResultSearch,
        name: 'resultSearch'
      }
    ]
  }, {
    path: '/login',
    component: Login,
    name: 'login'
  }, {
        path: '/register',
        component: Register,
        name: 'register'
    },
    {
    path: '/reset-password',
    component: InputEmail,
    name: 'resetPassword'
  }, {
    path: '/tests',
    component: Layout,
    children: [
      {
        path: '',
        component: TestList,
        name: 'manage test'
      },
      {
        path: 'create',
        component: TestEdit,
        name: 'create test',
        props: { isEdit: false }
      },
      {
        path: ':id(\\d+)',
        component: TestEdit,
        name: 'edit test'
      }
    ]
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

]
export default new Router({
  mode: 'history',
  routes
})
