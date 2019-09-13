<template>
    <div class="container-fluid row justify-content-center footer">
        <span>Copyright © BKTOEIC 2019</span>
        <img class="avatar"  src="https://wpimg.wallstcn.com/f778738c-e4f8-4870-b634-56703b4acafe.gif?imageView2/1/w/80/h/80">
    </div>
</template>

<script>
    export default {
        name: "Footer"
    }
</script>

<style scoped>
    .footer{
        height: 5em;
        line-height: 5em;
        padding-left: 5em;
        bottom: 0;
        background-color: #64d9d6;
        z-index: 0;
        position: fixed;
        /*width: 100%;*/
        bottom: -12px !important;
        /*position: absolute;*/
    }
    .container-fluid {
        padding: 0;
        margin: 0;
        /*height: 100%;*/
    }
    * {
        font-size: 0.97em;
    }
    .avatar{
        height: 50px;
        width: 45px;
        align-content: center;
        padding-top: 10px;
        margin-left: 10px;
        /*border-radius: 10px;*/
        /*border-top-left-radius: 10px;*/
    }
</style>
