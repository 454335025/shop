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
                        <a href="/managers/shop_sub_directory/to_shop_sub_directory_add" class="btn btn-danger"
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
                            <th>主目录名称</th>
                            <th>子目录名称</th>
                            <th>URL</th>
                            <th>排序</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($shop_sub_directories as $shop_sub_directory) { ?>
                            <tr>
                                <td><?php echo $shop_sub_directory->id ?></td>
                                <td><?php echo $shop_sub_directory->belongsToDirectories->name ?></td>
                                <td><?php echo $shop_sub_directory->name ?></td>
                                <td><?php echo $shop_sub_directory->url ?></td>
                                <td><?php echo $shop_sub_directory->sort ?></td>
                                <td><?php echo $shop_sub_directory->created_at ?></td>
                                <td>
                                    <a href="/managers/shop_sub_directory/to_shop_sub_directory_update?shop_sub_directory_id=<?php echo $shop_sub_directory->id ?>">修改</a>
                                    <a href="javascript:delete_shop_sub_directory(<?php echo $shop_sub_directory->id ?>)">删除</a>
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
    function delete_shop_sub_directory(shop_sub_directory_id) {
        sweetAlert({
            title: "你确定要删除么？",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "删除",
            cancelButtonText: "取消",
            closeOnConfirm: false
        }, function () {
            $.post("/managers/shop_sub_directory/delete_shop_sub_directory", {shop_sub_directory_id: shop_sub_directory_id}, function (data) {
                if (data == 1) {
                    swal("删除成功!", "", "success");
                    window.location.href = "/managers/shop_sub_directory/to_shop_sub_directory";
                } else {
                    swal("删除成功!", "", "error");
                }
            });
        });
    }
</script>
