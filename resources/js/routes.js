import Report from "./components/backend/Report";
import InfoAdmin from "./components/backend/InfoAdmin";
import Layout from "./components/backend/Layout";
import ManageAccount from "./components/backend/ManageAccount";

export const routes = [
    { path: '/hehe', components: {
            companiesIndex: Layout
        }
    },
    { path: '/manage-account', component: ManageAccount
    },
    { path: '/list-report', component: Report },
    { path: '/info-account', component: InfoAdmin }
];
