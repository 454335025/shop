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
<!--                        <a href="/managers/shop_order/to_shop_order_add" class="btn btn-danger"-->
<!--                           style="background-color: #399bff;">-->
<!--                            <i class="fa fa-pencil"></i>添加-->
<!--                        </a>-->
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table id="example0" class="table display">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>订单编号</th>
                            <th>订单类型</th>
                            <th>用户名</th>
                            <th>奖励积分</th>
                            <th>实际金额</th>
                            <th>是否使用积分</th>
                            <th>消耗积分</th>
                            <th>积分抵扣金额</th>
                            <th>是否收货</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($shop_orders as $shop_order) { ?>
                            <tr>
                                <td><?php echo $shop_order->id ?></td>
                                <td><?php echo $shop_order->order_id ?></td>
                                <?php if($shop_order->type == 1){ ?>
                                <td><label style="color: red;">待处理</label></td>
                                <?php }else if($shop_order->type == 2){ ?>
                                <td><label style="color: green;">已发货</label></td>
                                <?php }else if($shop_order->type == 3){ ?>
                                <td>已完成</td><?php } ?>
                                <td><?php echo $shop_order->belongsToUser->username ?></td>
                                <td><?php echo $shop_order->get_integral ?></td>
                                <td><?php echo $shop_order->actual_money ?></td>
                                <td><?php echo $shop_order->is_use_integral ?></td>
                                <td><?php echo $shop_order->cost_integral ?></td>
                                <td><?php echo $shop_order->integral_money ?></td>
                                <td><?php echo $shop_order->is_send ?></td>
                                <td><?php echo $shop_order->created_at ?></td>
                                <td><?php echo $shop_order->updated_at ?></td>
                                <td>
                                    <a href="/managers/shop_order_detail/to_shop_order_detail?shop_order_id=<?php echo $shop_order->id ?>&shop_order_order_id=<?php echo $shop_order->order_id ?>">订单详情</a>
                                    <?php if($shop_order->type == 1){ ?><a href="javascript:update_shop_order(<?php echo $shop_order->id ?>)">发货</a><?php } ?>
                                    <!--                                    <a href="/managers/shop_order/to_shop_order_update?shop_order_id=--><?php //echo $shop_order->id ?><!--">修改</a>-->
<!--                                    <a href="javascript:delete_shop_order(--><?php //echo $shop_order->id ?><!--)">删除</a>-->
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
    function update_shop_order(shop_order_id) {
        sweetAlert({
            title: "你确定要发货么？",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "发货",
            cancelButtonText: "取消",
            closeOnConfirm: false
        }, function () {
            $.post("/managers/shop_order/update_shop_order", {shop_order_id: shop_order_id}, function (data) {
                if (data == 1) {
                    swal("发货成功!", "", "success");
                    setTimeout(function () {
                        window.location.href = "/managers/shop_order/to_shop_order";
                    }, 1500);
                } else {
                    swal("删除成功!", "", "error");
                }
            });
        });
    }
</script>

