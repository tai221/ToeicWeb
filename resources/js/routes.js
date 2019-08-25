import Report from "./components/backend/Report";
import InfoAdmin from "./components/backend/InfoAdmin";
import Layout from "./components/backend/Layout";
import ManageAccount from "./components/backend/ManageAccount";
import CreateAccount from "./components/backend/CreateAccount";

export const routes = [
    {
        path: '/',
        component: Layout},
    { path: '/admin/companies/manage-account', component: ManageAccount, name:"manageaccount"},
    { path: '/admin/companies/manage-account/create', component: CreateAccount, name:"createaccount"},
    { path: '/admin/companies/list-report', component: Report },
    { path: '/admin/companies/info-account', component: InfoAdmin }
];
