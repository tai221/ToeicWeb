<template>

        <!-- Khung ngoai table -->
        <div class="col-11 row justify-content-center hello"
             style="border: 1px black solid; margin-top: 3em; padding: 0">
            <!-- tieu de khung ngoai -->
            <div class="col-12"
                 style="height: 2em; background-color: #B8B8B8; line-height: 2em">
                <span>Bảng quản lý tài khoản</span>
            </div>

            <!-- search -->
<!--            <div class="col-12 row"-->
<!--                 style="padding-top: 1em; padding-bottom: 1em">-->
<!--                <div class="col-12 col-sm-6 row" id="noti">-->
<!--                    &lt;!&ndash; <c:if test="${noti=='1'}"> &ndash;&gt;-->
<!--                    @if($noti=='1')-->
<!--                    <span style="color: green">Thêm tài khoản thành công.</span>-->
<!--                    @endif-->
<!--                    @if($noti=='2')-->
<!--                    <span style="color: red">Thêm tài khoản không thành công.</span>-->
<!--                    @endif-->
<!--                    @if($noti=='3')-->
<!--                    <span style="color: red">Không được để trống các trường.</span>-->
<!--                    @endif-->
<!--                </div>-->

<!--            </div>-->

            <!-- TABLE -->
            <div class="justify-content-center col-12 main-table" id="my-table">
                <table class="table table-bordered" style="min-width: 800px">
                    <thead class="thead-dark">
                    <tr class="d-flex">
                        <th class="col-sm-1 col-md-1" data-name="id"><span>ID</span><img
                            class="ico-filter" alt="filter" src="../../images/filter.png"></th>
                        <th class="col-sm-4 col-md-4" data-name="username"><span>Username</span><img
                            class="ico-filter" alt="filter" src="../../images/filter.png"></th>
                        <th class="col-sm-4 col-md-4" data-name="email"><span>Email</span><img
                            class="ico-filter" alt="filter" src="../../images/filter.png"></th>
                        <th class="col-sm-3 col-md-3" data-name="hasRole"><span>ROLE</span><img
                            class="ico-filter" alt="filter" src="../../images/filter.png"></th>
                    </tr>
                    </thead>
                    <tbody>

                        <tr class="d-flex" v-for="userAccount in userAccounts" >
                            <td class="col-sm-1 col-md-1">{{userAccount.id}}</td>
                            <td class="col-sm-4 col-md-4">{{userAccount.username}}</td>
                            <td class="col-sm-4 col-md-4">{{userAccount.email}}</td>
                            <td class="col-sm-3 col-md-3">{{userAccount.hasRole}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <!-- btn ban -->
<!--            <div class="col-11 row justify-content-start"-->
<!--                 style="margin-top: 3em; margin-bottom: 5em">-->
<!--                <input class="btn-func" id="add" type="button" name=""-->
<!--                       value="Add account" , data-toggle="modal"-->
<!--                       data-target="#myModal-add"-->
<!--                       style="padding: 0.8em 1em; background-color: #02671c; color: white; border: none">-->

<!--                <input class="btn-func" id="update" type="button" name=""-->
<!--                       value="Update account" ,-->
<!--                       style="padding: 0.8em 1em; background-color: #c5a403; color: white; border: none">-->

<!--                <input class="btn-func" id="del" type="button" name=""-->
<!--                       value="Delete account"-->
<!--                       style="padding: 0.8em 1em; background-color: #373738; color: white; border: none">-->

<!--                <input class="btn-func" id="unban" type="button" name=""-->
<!--                       value="Unban account"-->
<!--                       style="padding: 0.8em 1em; background-color: #085d96; color: white; border: none">-->

<!--                <input class="btn-func" id="ban" type="button" name=""-->
<!--                       value="Ban account"-->
<!--                       style="padding: 0.8em 1em; background-color: #F70000; color: white; border: none">-->
<!--            </div>-->
        </div>

</template>

<script>
    export default {
        name: "ManageAccount",
        data() {
            return {
                userAccounts:[]
            }
        }
    }
</script>

<style scoped>
    .qltk{
        padding: 300px;
    }
</style>
