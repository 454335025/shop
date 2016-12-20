<!-- START CONTAINER -->
<div class="container-padding">
    <!-- Start Row -->
    <div class="row">
        <!-- Start Panel -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-title">
                    <?php echo $title?>
                </div>
                <div class="panel-body table-responsive">
                    <table id="example0" class="table display">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>用户名</th>
                            <th>父菜单名称</th>
                            <th>子菜单名称</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($relation_menus as $relation_menu) { ?>
                            <tr>
                                <td><?php echo $relation_menu->id ?></td>
                                <td><?php echo $relation_menu->belongsToMenus->name ?></td>
                                <td><?php echo $relation_menu->belongsToSubMenus->name ?></td>
                                <td><?php echo $relation_menu->created_at ?></td>
                                <td><?php echo $relation_menu->updated_at ?></td>
                                <td>
                                    <a href="/managers/relation_menu/to_relation_menu_update?user_id=<?php echo $relation_menu->user_id ?>">修改</a>
                                    <a href="javascript:delete_relation_menu(<?php echo $relation_menu->user_id ?>)">删除</a>
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
    function delete_relation_menu(u) {
        sweetAlert({
            title: "你确定要删除么？",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "删除",
            cancelButtonText: "取消",
            closeOnConfirm: false
        }, function () {
            $.post("/managers/relation_menu/delete_relation_menu", {relation_menu_id: relation_menu_id}, function (data) {
                if (data == 1) {
                    swal("删除成功!", "", "success");
                    window.location.href = "/managers/relation_menu/to_relation_menu";
                } else {
                    swal("删除成功!", "", "error");
                }
            });
        });
    }
</script>

