<template>
    <div class="container">
        <app-header></app-header>
        <div class="row">
            <div class="col-xs-2">
                <app-sidebar></app-sidebar>
            </div>
            <div class="col-xs-10">
<!--                <transition name="slide" mode="out-in">-->
                    <router-view></router-view>
<!--                </transition>-->
            </div>
        </div>
        <app-footer></app-footer>
    </div>
</template>

<script>
import Header from './Header';
import Footer from "./Footer";
import Sidebar from "./Sidebar";
export default {
    name: "Layout",
    component:{
        appHeader: Header,
        appFooter: Footer,
        appSidebar: Sidebar
    }

}
</script>

<style scoped>

</style>
