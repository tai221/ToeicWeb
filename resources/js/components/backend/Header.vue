<template>
    <nav class="navbar navbar-expand bg-dark navbar-dark fixed-top">
	<div class="container-fluid">
		<!-- Brand -->
<!--		<img class="btn-expand" id="list-ico" alt="expand"-->
<!--			src="{{URL::asset("imgs/list.png")}}">-->
<!--		<img class="btn-expand hide" id="hide-ico" alt="expand"-->
<!--			src="{{URL::asset("imgs/hide.png")}}">-->
<!--        <router-link :to="xxx" class="navbar-brand">BKTOEIC ADMIN</router-link>-->

		<!-- Navbar links -->
		<div class=" navbar-collapse justify-content-end"
			id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item" id="recv-rp">
					<router-link to="/list-report" class="nav-link mr-100" >
						<img class="ico-header" src="../../images/email-icon.png">
					</router-link>
					<div class="sum-notice">{{countReport}}</div>
				</li>

				<li class="nav-item"><router-link to="/info-account" class="nav-link" ><img
						class="ico-header"
						src="../../images/account-icon.png"></router-link></li>
			</ul>
		</div>
	</div>
</nav>
</template>
<script>
    export default {
        name: "Header",
        data() {
            return {
                countReport: 0
            }
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

</style>
