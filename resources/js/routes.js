import Report from "./components/backend/Report";
import InfoAdmin from "./components/backend/InfoAdmin";
import ManageAccount from "./components/backend/ManageAccount";

export const routes = [
    { path: '/', component: ManageAccount },
    { path: '/list-report', component: Report },
    { path: '/info-account', component: InfoAdmin }
];
