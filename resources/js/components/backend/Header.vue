<template>
    <div>
        <nav class="navbar navbar-expand bg-dark navbar-dark fixed-top">
            <div class="container-fluid">
                <!-- Brand -->

        		<img class="btn-expand" id="list-ico" alt="expand" @click="changeStateSidebar" v-bind:class="{hide: stateSidebar}"
        			src="../../images/list.png">
        		<img class="btn-expand " id="hide-ico" alt="expand" v-bind:class="{hide: !stateSidebar}" @click="changeStateSidebar"
        			src="../../images/hide.png">
<!--                <router-link :to="xxx" class="navbar-brand">BKTOEIC ADMIN</router-link>-->

                <!-- Navbar links -->
                <div class=" navbar-collapse justify-content-end"
                    id="collapsibleNavbar">
                    <ul class="navbar-nav ">
                        <li class="nav-item" id="recv-rp">
                            <router-link to="/admin/companies/list-report" class="nav-link mr-100" >
                                <img class="ico-header" src="../../images/email-icon.png">
                            </router-link>
                            <div class="sum-notice">{{countReport}}</div>
                        </li>

                        <li class="nav-item">
                            <router-link to="/admin/companies/info-account" class="nav-link" >
                                <img class="ico-header" src="../../images/account-icon.png">
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>
<script>
    import {mapGetters} from 'vuex';
    import {mapActions} from 'vuex'
    export default {
        name: "Header",
        data() {
            return {
                countReport: 0
            }
        },
        computed:{
            ...mapGetters([
                'stateSidebar'
            ])
        },
        methods: {
            ...mapActions([
                'changeStateSidebar'
            ])
        }
        // mounted() {
        //     var app = this;
        //     axios.get('/api/v1/companies')
        //         .then(function (resp) {
        //             app.countReport = resp.data;
        //         })
        //         .catch(function (resp) {
        //             console.log(resp);
        //             alert("Could not load count report");
        //         });
        // },
    }
</script>

<style scoped>

    .navbar {
        padding-left: 0;
    }

    .btn-expand {
        height: 100%;
        margin: 0 8px;
        cursor: pointer;
    }

    .sidebar-nav {
        position: fixed;
        top: 0;
        height: 100%;
        width: 15em;
        margin: 0;
        padding: 0;
        background-color: #212529;
        list-style: none;
        z-index: 1;
        padding-top: 4em;
    }

    .group-rp {
        border-bottom: 1px solid #dccece !important;
        padding-bottom: 1em;
    }

    li.nav-item{
        cursor: pointer;
        position: relative;
    }

    .sum-notice {
        position: absolute;
        top: 0;
        background: red;
        color: white;
        border-radius: 1em;
        min-width: 1.5em;
        min-height: 1.5em;
        line-height: 1.5em;
        text-align: center;
        right: 1.3em;
        padding: 2px;
        font-size: 0.9em;
    }

    .one-rp {
        padding-bottom: 1em;
        background: #f7f7f7c2;
    }

    .acc-rp {
        font-size: 1.2em;
        font-weight: bold;
    }

    .content-rp {
        font-size: 1.2em;
    }

    .div-proc-rp {
        text-align: right;
        margin-top: 1.3em;
    }

    .proc-rp {
        color: white;
    }

    #skip-rp {
        background: #ff3d00;
    }

    #view-rp {
        background: #0b5a0e;
    }

    .choice {
        color: white !important;
    }

    /*.sidebar-nav li {*/
    /*    text-indent: 2em;*/
    /*    line-height: 3.5em;*/
    /*}*/

    /*.sidebar-nav li a {*/
    /*    display: block;*/
    /*    text-decoration: none;*/
    /*    color: #999999;*/
    /*}*/

    /*.sidebar-nav li a:hover {*/
    /*    text-decoration: none;*/
    /*    color: #fff;*/
    /*    background: rgba(255, 255, 255, 0.2);*/
    /*}*/

    /*.sidebar-nav li a:active, .sidebar-nav li a:focus {*/
    /*    text-decoration: none;*/
    /*}*/

    .ico-manag {
        width: 1.5em;
        margin-right: 0.5em;
    }

    .ico-header {
        width: 1.3em;
    }

    .hide {
        display: none;
    }
</style>
