<template>
    <div>
        <nav class="navbar navbar-expand bg-dark navbar-dark fixed-top">
            <div class="container-fluid">
                <!-- Brand -->

        		<img
                    class="btn-expand"
                    id="list-ico"
                    alt="expand"
                    @click="changeStateSidebar"
                    v-bind:class="{hide: stateSidebar}"
        			src="../../../images/list.png">
        		<img
                    class="btn-expand "
                    id="hide-ico"
                    alt="expand"
                    v-bind:class="{hide: !stateSidebar}"
                    @click="changeStateSidebar"
        			src="../../../images/hide.png">
<!--                <router-link :to="xxx" class="navbar-brand">BKTOEIC ADMIN</router-link>-->

                <!-- Navbar links -->
                <div
                    class=" navbar-collapse justify-content-end"
                    id="collapsibleNavbar">
                    <ul class="navbar-nav ">
                        <select class="selectpicker" data-width="fit" v-model="locale">
                            <option data-content='<span class="flag-icon flag-icon-us"></span> English'>en</option>
                            <option  data-content='<span class="flag-icon flag-icon-mx"></span> Español'>vn</option>
                        </select>
                        <li class="nav-item dropdown" id="recv-rp">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fa fa-bell"></i>
                                <span class="badge badge-light">{{notifications.length}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li v-if="notifications.length > 0" v-on:click="markAsRead() " style="color: #ae1c17">{{ $t('header.markAsRead') }}</li>
                                <li v-for="noti in notifications" style="color: #1820dd">{{noti.data.data}}</li>
                            </ul>
                        </li>

<!--                        <li class="nav-item">-->
<!--                            <router-link to="/admin/companies/info-account" class="nav-link" >-->
<!--                                <img class="ico-header" src="../../../images/account-icon.png">-->
<!--                            </router-link>-->
<!--                        </li>-->
                        <li style="size: 20px; color: #ae1c17; margin-right: 100px">
                            {{username}}
                        </li>
                        <li class="nav-item logout" style="color: #3f9ae5; margin-left: 5px; margin-right: 5px" v-if="loggedIn" v-on:click="logout()">
                            <i class="fa fa-sign-out" :title="$t('header.logout')" aria-hidden="true"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>
<script>
import { mapGetters, mapActions } from 'vuex'
import Cookies from 'js-cookie'
import { getNoti, markAsRead } from '../../../api/notification'

export default {
  name: 'Header',
  data(){
    return{
      locale: Cookies.get('language')||'en'
    }
  },
  watch: {
    locale() {
      this.$i18n.locale = this.locale
      this.$store.dispatch('setLanguage', this.locale)
    }
  },
  computed: {
    ...mapGetters([
      'stateSidebar',
      'loggedIn',
      'username',
      'notifications',
      'language'
    ])
  },
  created() {
    getNoti()
      .then((response) => {
        const notifications = response.data
        this.$store.dispatch('updateNotifications', notifications)
      })
      .catch((error) => {
        console.log(error)
      })
  },
  mounted() {
    const pusher = new Pusher('e6b2660952105b0dc309', {
      cluster: 'ap1',
      forceTLS: true
    })
    const channel = pusher.subscribe('send-noti')
    const app = this
    channel.bind('NotificationEvent', (data) => {
      const notifications = data
      app.$store.dispatch('updateNotifications', notifications)
    })
  },
  methods: {
    ...mapActions([
      'changeStateSidebar'

    ]),
    logout() {
      this.$store.dispatch('destroyToken')
        .then((response) => {
          this.$router.push({ name: 'login' })
        })
    },
    markAsRead() {
      markAsRead()
        .then((response) => {
          this.$store.dispatch('deleteNotifications')
        })
    }
  }
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

    .selectpicker{
        margin-right: 10px;
    }

    #recv-rp{
        margin-right: 10px;
    }
    #collapsibleNavbar {
        /*margin-right: 25px;*/
    }
</style>
