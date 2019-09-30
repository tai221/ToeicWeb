<template>
    <div style="overflow-x: hidden;" id="app" >
        <app-header></app-header>
        <app-sidebar></app-sidebar>
        <div class="container">
            <div v-bind:class="{ container1: stateSidebar, container2: !stateSidebar }">
                <transition name="fade-transform" mode="out-in">
                <router-view></router-view>
                </transition>
            </div>
        </div>
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
    },
    watched: {
        '$route'(to, from){

        }
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
    }
</style>
