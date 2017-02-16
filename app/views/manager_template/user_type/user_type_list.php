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
                        <a href="/managers/user_type/to_user_type_add" class="btn btn-danger"
                           style="background-color: #399bff;">
                            <i class="fa fa-pencil"></i>添加
                        </a>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table id="example0" class="table display">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>用户类型</th>
                            <th>订单折扣</th>
                            <th>最低使用积分</th>
                            <th>多少钱1分</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($user_types as $user_type) { ?>
                            <tr>
                                <td><?php echo $user_type->id ?></td>
                                <td><?php echo $user_type->type ?></td>
                                <td><?php echo $user_type->discount ?></td>
                                <td><?php echo $user_type->min_integral ?></td>
                                <td><?php echo $user_type->exchange ?></td>
                                <td>
                                    <a href="/managers/user_type/to_user_type_update?user_type_id=<?php echo $user_type->id ?>">修改</a>
                                    <a href="javascript:delete_user_type(<?php echo $user_type->id ?>);">删除</a>
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
    function delete_user_type(user_type_id) {
        sweetAlert({
            title: "你确定要删除么？",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "删除",
            cancelButtonText: "取消",
            closeOnConfirm: false
        }, function () {
            $.post("/managers/user_type/delete_user_type", {user_type_id: user_type_id}, function (data) {
                if (data == 1) {
                    swal("删除成功!", "", "success");
                    window.location.href = "/managers/user_type/to_user_type";
                } else if(data == 2) {
                    swal("不能删除，还有商户是该类型", "", "error");
                }else{
                    swal("删除失败!", "", "error");
                }
            });
        });
    }
</script>

