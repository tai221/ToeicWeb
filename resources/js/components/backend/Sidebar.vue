<template>
    <div id="sidebar-wrapper" class="hide">
        <ul class="sidebar-nav">
            <li><router-link  to="/manage-account"><img class="ico-manag"
                                                                                src="../../images/account-manager.png">Quản
                lý tài khoản</router-link>
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
    export default {
        name: "Sidebar"
    }
</script>

<style scoped>

</style>
