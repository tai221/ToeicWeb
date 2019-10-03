<template>
    <div id="sidebar-wrapper" v-bind:class="{hide: !stateSidebar }" >
        <ul class="sidebar-nav ">
            <li><router-link  :to="{name: 'manageaccount'}" ><img class="ico-manag"
                                                                                src="../../../images/account-manager.png">{{ $t('route.manageAccount') }}</router-link>
            </li>

<!--            <li>< id="link-listen" href="{{Route("listeningpartcontroller.get")}}"><img class="ico-manag"-->
<!--                                                                                         src="{{URL::asset("imgs/baihoc-manager.png")}}">Quản-->
<!--                lý bài nghe</a></li>-->

<!--            <li><a id="link-read" href="{{Route("readingpartcontroller.getlistpartdoc")}}"><img class="ico-manag"-->
<!--                                                                                                src="{{URL::asset("imgs/baihoc-manager.png")}}">Quản-->
<!--                lý bài đọc</a></li>-->

<!--            <li><a id="link-test" href="{{Route("testcontroller.indexforadminhome")}}"><img class="ico-manag"-->
<!--                                                                                            src="{{URL::asset("imgs/baihoc-manager.png")}}">Quản-->
<!--                lý bài BKT</a></li>-->

<!--            <li><a id="link-discuss" href="{{Route("discussioncontroller.indexadminmanager")}}"><img class="ico-manag"-->
<!--                                                                                                     src="{{URL::asset("imgs/btl-manager.png")}}">Quản-->
<!--                lý bài thảo luận</a></li>-->
        </ul>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    export default {
        name: "Sidebar",
        computed:{
            ...mapGetters([
                'stateSidebar'
            ])
        }
    }
</script>

<style scoped>
    .sidebar-nav {
        position: fixed;
        top: 0;
        height: 94%;
        width: 15em;
        margin-left: 0;
        padding: 0;
        background-color: #304156;
        list-style: none;
        z-index: 1;
        padding-top: 4em;
    }


    li.nav-item{
        cursor: pointer;
        position: relative;
    }


    .sidebar-nav li {
        text-indent: 2em;
        line-height: 3.5em;
    }

    .sidebar-nav li a {
        display: block;
        text-decoration: none;
        color: #999999;
    }

    .sidebar-nav li a:hover {
        text-decoration: none;
        color: #fff;
        background: rgba(255, 255, 255, 0.2);
    }

    .sidebar-nav li a:active, .sidebar-nav li a:focus {
        text-decoration: none;
    }

    .ico-manag {
        width: 1.5em;
        margin-right: 0.5em;
    }


    .hide {
        display: none;
    }
</style>
