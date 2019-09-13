<template>
    <div style="overflow-x: hidden;">
        <app-header></app-header>
<!--        <div class="row">-->
<!--            <div class="col-xs-2 col-sm-2 ">-->
                <app-sidebar></app-sidebar>
<!--            </div>-->
<!--            <div class="col-xs-10 col-sm-10 main">-->
<!--                <transition name="slide" mode="out-in">-->
        <div class="container">
            <div v-bind:class="{ container1: stateSidebar, container2: !stateSidebar }">
                 <router-view></router-view>
            </div>
        </div>

<!--                </transition>-->
<!--            </div>-->
<!--        </div>-->
        <app-footer></app-footer>
    </div>
</template>

<script>
import Header from './Header/Header';
import Footer from "./Footer/Footer";
import Sidebar from "./Sidebar/Sidebar";
import {mapGetters} from 'vuex';
export default {
    name: "Layout",
    components:{
        appHeader: Header,
        appFooter: Footer,
        appSidebar: Sidebar
    },
    computed:{
        ...mapGetters([
            'stateSidebar'
        ])
    }

}
</script>

<style scoped>
    .main{
        padding-top: 5em;
    }
    .container1{
        padding-top: 55px;
        margin-left: 20%;
    }
    .container2{
        padding-top: 55px;
        /*margin-left: 20%;*/
    }

</style>
