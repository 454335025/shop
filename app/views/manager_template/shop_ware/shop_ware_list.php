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
                        <a href="/managers/shop_ware/to_shop_ware_add" class="btn btn-danger" style="background-color: #399bff;">
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
                            <th>商品名称</th>
                            <th>子目录</th>
                            <th>排序</th>
                            <th>是否折扣</th>
                            <th>金额</th>
                            <th>实际金额</th>
                            <th>奖励积分</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                            <th>是否兑换</th>
                            <th>兑换积分</th>
                            <th>图片操作</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($shop_wares as $shop_ware) { ?>
                            <tr>
                                <td><?php echo $shop_ware->id ?></td>
                                <td><?php echo $shop_ware->name ?></td>
                                <td><img style="width: 60px;height: 60px;" src="<?php echo $shop_ware->main_img ?>"></td>
                                <td><?php echo $shop_ware->belongsToSubDirectories->name ?></td>
                                <td><?php echo $shop_ware->sort ?></td>
                                <td><?php if($shop_ware->is_discount == 1){echo '是';}else {echo '否';} ?></td>
                                <td><?php echo $shop_ware->original_money ?></td>
                                <td><?php echo $shop_ware->money ?></td>
                                <td><?php echo $shop_ware->integral ?></td>
                                <td><?php echo $shop_ware->created_at ?></td>
                                <td><?php echo $shop_ware->updated_at ?></td>
                                <td><?php if($shop_ware->is_integral == 1){echo '是';}else {echo '否';} ?></td>
                                <td><?php echo $shop_ware->cost_integral ?></td>
                                <td>
                                    <a href="/managers/shop_ware/to_shop_ware_image_update?shop_ware_id=<?php echo $shop_ware->id ?>">图片</a>
                                    <a href="/managers/shop_ware/to_shop_ware_update?shop_ware_id=<?php echo $shop_ware->id ?>">描述图片管理</a>
                                </td>
                                <td>
                                    <a href="/managers/shop_ware/to_shop_ware_update?shop_ware_id=<?php echo $shop_ware->id ?>">修改</a>
                                    <a href="javascript:delete_shop_ware(<?php echo $shop_ware->id ?>)">删除</a>
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
    function delete_shop_ware(shop_ware_id) {
        sweetAlert({
            title: "你确定要删除么？",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "删除",
            cancelButtonText: "取消",
            closeOnConfirm: false
        }, function () {
            $.post("/managers/shop_ware/delete_shop_ware", {shop_ware_id: shop_ware_id}, function (data) {
                if (data == 1) {
                    swal("删除成功!", "", "success");
                    setTimeout(function (){
                        window.location.href = "/managers/shop_ware_id/to_shop_ware_id";
                    },1500);
                } else {
                    swal("删除成功!", "", "error");
                }
            });
        });
    }
</script>

