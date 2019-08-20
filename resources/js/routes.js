import Report from "./components/backend/Report";
import InfoAdmin from "./components/backend/InfoAdmin";
import Layout from "./components/backend/Layout";
import ManageAccount from "./components/backend/ManageAccount";

export const routes = [
    {
        path: '/',
        component: Layout},
    { path: '/admin/companies/manage-account', component: ManageAccount, name:"manageaccount"},
    { path: '/admin/companies/list-report', component: Report },
    { path: '/admin/companies/info-account', component: InfoAdmin }
];
