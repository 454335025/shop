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
                        <a href="/managers/user/to_user_add" class="btn btn-danger" style="background-color: #399bff;">
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
                            <th>邮箱</th>
                            <th>手机号</th>
                            <th>是否管理员</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td><?php echo $user->id ?></td>
                                <td><?php echo $user->username ?></td>
                                <td><?php echo $user->email ?></td>
                                <td><?php echo $user->phone ?></td>
                                <td><?php echo $user->isroot ?></td>
                                <td><?php echo $user->created_at ?></td>
                                <td><?php echo $user->updated_at ?></td>
                                <td>
                                    <a href="/managers/sub_menu/to_sub_menu_update?sub_menu_id=<?php echo $user->id ?>">修改</a>
                                    <a href="javascript:delete_user(<?php echo $user->id ?>)">删除</a>
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
    function delete_user(user_id) {
        sweetAlert({
            title: "你确定要删除么？",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "删除",
            cancelButtonText: "取消",
            closeOnConfirm: false
        }, function () {
            $.post("/managers/user/delete_user", {user_id: user_id}, function (data) {
                if (data == 1) {
                    swal("删除成功!", "", "success");
                    window.location.href = "/managers/user/to_user";
                } else {
                    swal("删除成功!", "", "error");
                }
            });
        });
    }
</script>

