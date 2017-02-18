<!-- START CONTAINER -->
<div class="container-padding">
    <!-- Start Row -->
    <div class="row">
        <!-- Start Panel -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-title">
                    <?php echo $title?>
                    <div style="float:right ">
                        <a href="###" class="btn btn-danger" style="background-color: #399bff;">
                            <i class="fa fa-pencil"></i>添加
                        </a>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table id="example0" class="table display">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>用户名</th>
                            <th>头像</th>
                            <th>openid</th>
                            <th>用户类型</th>
                            <th>真实姓名</th>
                            <th>地址</th>
                            <th>手机号</th>
                            <th>邮箱</th>
                            <th>积分</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($shop_users as $shop_user) { ?>
                            <tr>
                                <td><?php echo $shop_user->id ?></td>
                                <td><?php echo $shop_user->username ?></td>
                                <td><img style="width: 40px;height: 40px;" src="<?php echo $shop_user->headimgurl ?>"></td>
                                <td><?php echo $shop_user->openid ?></td>
                                <td><?php echo $shop_user->hasOneUserType->type ?></td>
                                <td><?php echo $shop_user->relaname ?></td>
                                <td><?php echo $shop_user->address ?></td>
                                <td><?php echo $shop_user->phone ?></td>
                                <td><?php echo $shop_user->email ?></td>
                                <td><?php echo $shop_user->integral ?></td>
                                <td><?php echo $shop_user->created_at ?></td>
                                <td><?php echo $shop_user->updated_at ?></td>
                                <td>
                                    <a href="/managers/shop_user/to_shop_user_update?shop_user_id=<?php echo $shop_user->id ?>">修改</a>
                                    <a href="javascript:delete_shop_user(<?php echo $shop_user->id ?>)">删除</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Panel -->
    </div>
    <!-- End Row -->
</div>
<!-- END CONTAINER -->

<!-- ================================================
Data Tables
================================================ -->
<script src="<?php echo STATIC_COMMON; ?>/js/datatables/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#example0').DataTable();
    });
    function delete_shop_user(shop_user_id) {
        sweetAlert({
            title: "你确定要删除么？",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "删除",
            cancelButtonText: "取消",
            closeOnConfirm: false
        }, function () {
            $.post("/managers/shop_user/delete_shop_user", {shop_user_id: shop_user_id}, function (data) {
                if (data == 1) {
                    swal("删除成功!", "", "success");
                    setTimeout(function () {
                        window.location.href = "/managers/shop_user/to_shop_user";
                    }, 1500);
                } else {
                    swal("删除成功!", "", "error");
                }
            });
        });
    }
</script>

