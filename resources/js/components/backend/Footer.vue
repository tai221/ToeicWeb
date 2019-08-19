<template>
    <div class="container-fluid row justify-content-center footer">
        <span>Copyright © BKTOEIC 2019</span>
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
        background-color: #E8E8E8;
        z-index: 0;
        /*position: fixed;*/
        /*width: 100%;*/
        bottom: -12px !important;
        position: absolute;
    }
    .container-fluid {
        padding: 0;
        margin: 0;
        /*height: 100%;*/
    }
    * {
        font-size: 0.97em;
    }
</style>
