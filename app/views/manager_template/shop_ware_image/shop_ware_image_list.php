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
                        <a href="/managers/shop_ware_image/to_shop_ware_image_add?shop_ware_id=<?php echo $shop_ware_id;?>" class="btn btn-danger" style="background-color: #399bff;">
                            <i class="fa fa-pencil"></i>添加
                        </a>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table id="example0" class="table display">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>商品名称</th>
                            <th>描述图片</th>
                            <th>排序</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($shop_ware_images as $shop_ware_image) { ?>
                            <tr>
                                <td><?php echo $shop_ware_image->id ?></td>
                                <td><?php echo $shop_ware_image->belongsToWare->name ?></td>
                                <td><img style="width: 150px;height: 200px;" src="<?php echo $shop_ware_image->image ?>"></td>
                                <td><?php echo $shop_ware_image->sort ?></td>
                                <td><?php echo $shop_ware_image->created_at ?></td>
                                <td><?php echo $shop_ware_image->updated_at ?></td>
                                <td>
                                    <a href="/managers/shop_ware_image/to_shop_ware_image_update?shop_ware_id=<?php echo $shop_ware_id;?>&shop_ware_image_id=<?php echo $shop_ware_image->id ?>">修改</a>
                                    <a href="javascript:delete_shop_ware_image(<?php echo $shop_ware_image->id ?>)">删除</a>
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
    function delete_shop_ware_image(shop_ware_image_id) {
        sweetAlert({
            title: "你确定要删除么？",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "删除",
            cancelButtonText: "取消",
            closeOnConfirm: false
        }, function () {
            $.post("/managers/shop_ware_image/delete_shop_ware_image", {shop_ware_image_id: shop_ware_image_id}, function (data) {
                if (data == 1) {
                    swal("删除成功!", "", "success");
                    setTimeout(function (){
                        location.replace(location.href);
                    },1500);
                } else {
                    swal("删除成功!", "", "error");
                }
            });
        });
    }
</script>

