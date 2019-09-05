import Report from "./components/backend/Report";
import InfoAdmin from "./components/backend/InfoAdmin";
import Layout from "./components/backend/Layout";
import ManageAccount from "./components/backend/ManageAccount";
import CreateAccount from "./components/backend/CreateAccount";
import ResultSearch from "./components/backend/ResultSearch";

export const routes = [
    {
        path: '/',
        component: Layout
    },
    { path: '/admin/companies/manage-account', component: ManageAccount, name:'manageaccount'},
    { path: '/admin/companies/manage-account/create', component: CreateAccount, name:'createaccount'},
    { path: '/admin/companies/manage-account/edit/:id', component: CreateAccount, name:'editaccount'},
    { path: '/admin/companies/manage-account/result', component: ResultSearch, name:'resultSearch'},
    { path: '/admin/companies/list-report', component: Report },
    { path: '/admin/companies/info-account', component: InfoAdmin }
];
