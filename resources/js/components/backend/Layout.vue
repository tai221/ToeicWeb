<template>
    <div class="container">
        <app-header></app-header>
        <div>
            <div class="col-xs-2 col-sm-2 sidebar">
                <app-sidebar></app-sidebar>
            </div>
            <div class="col-xs-10 col-sm-10 main">
<!--                <transition name="slide" mode="out-in">-->
                    <router-view></router-view>
<!--                </transition>-->
            </div>
        </div>
<!--        <app-footer></app-footer>-->
    </div>
</template>

<script>
import Header from './Header';
import Footer from "./Footer";
import Sidebar from "./Sidebar";
export default {
    name: "Layout",
    components:{
        appHeader: Header,
        appFooter: Footer,
        appSidebar: Sidebar
    }

}
</script>

<style scoped>
    .main{
        padding-top: 5em;
    }
    .sidebar{
        margin-left: 0;
    }
</style>
