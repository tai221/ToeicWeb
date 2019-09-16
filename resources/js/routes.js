import Report from "./components/backend/Report/Report";
import InfoAdmin from "./components/backend/InfoAdmin/InfoAdmin";
import Layout from "./components/backend/Layout";
import ManageAccount from "./components/backend/ManageAccount/ManageAccount";
import CreateAccount from "./components/backend/ManageAccount/CreateAccount";
import ResultSearch from "./components/backend/ManageAccount/ResultSearch";

export const routes = [
    {
        path: '/',
        component: Layout
    },
    { path: '/admin/manage-account', component: ManageAccount, name:'manageaccount'},
    { path: '/admin/manage-account/create', component: CreateAccount, name:'createaccount'},
    { path: '/admin/manage-account/edit/:id', component: CreateAccount, name:'editaccount'},
    { path: '/admin/manage-account/result', component: ResultSearch, name:'resultSearch'},
    { path: '/admin/list-report', component: Report },
    { path: '/admin/info-account', component: InfoAdmin }
];
