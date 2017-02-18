<!-- START CONTAINER -->
<div class="container-padding">
    <!-- Start Row -->
    <div class="row">
        <!-- Start Panel -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-title">
                    订单详情
                    <div style="float:right ">
                        <a href="javascript:history.back(-1);" class="btn btn-danger" style="background-color: #399bff;">
                            <i class="fa fa-pencil"></i>返回
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <colgroup>
                            <col class="col-xs-1">
                            <col class="col-xs-3">
                            <col class="col-xs-1">
                            <col class="col-xs-3">
                        </colgroup>
                        <tbody>
                        <tr>
                            <th scope="row">
                                <code>订单编号</code>
                            </th>
                            <td><?php echo $shop_order->order_id ?></td>
                            <th scope="row">
                                <code>创建时间</code>
                            </th>
                            <td><?php echo $shop_order->created_at ?></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <code>收货人</code>
                            </th>
                            <td><?php echo $shop_order->belongsToUserAddress->realname ?></td>
                            <th scope="row">
                                <code>手机号</code>
                            </th>
                            <td><?php echo $shop_order->belongsToUserAddress->phone ?></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <code>订单类型</code>
                            </th>
                            <td>  <?php if ($shop_order->type == 1) { ?>
                                    <label style="color: red;">待处理</label>
                                <?php } else if ($shop_order->type == 2) { ?>
                                    <label
                                        style="color: green;">已发货</label><?php } else if ($shop_order->type == 3) { ?>已完成<?php } ?>
                            </td>
                            <th scope="row">
                                <code>奖励积分</code>
                            </th>
                            <td><?php echo $shop_order->get_integral ?></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <code>总金额</code>
                            </th>
                            <td><?php echo $shop_order->money ?></td>
                            <th scope="row">
                                <code>实际金额</code>
                            </th>
                            <td><?php echo $shop_order->actual_money ?></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <code>折扣比例</code>
                            </th>
                            <td><?php echo $shop_order->discount ?></td>
                            <th scope="row">
                                <code>折扣金额</code>
                            </th>
                            <td><?php echo $shop_order->discount_money ?></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <code>送货地址</code>
                            </th>
                            <td colspan="3"><?php echo $shop_order->belongsToUserAddress->address ?></td>
                        </tr>

                        <tr>
                            <th scope="row">
                                <code>是否使用积分</code>
                            </th>
                            <td><?php if ($shop_order->is_use_integral == 1) {
                                    echo '是';
                                } else {
                                    echo '否';
                                } ?></td>
                            <th scope="row">
                                <code>是否收货</code>
                            </th>
                            <td><?php if ($shop_order->is_send == 1) {
                                    echo '已收到';
                                } else {
                                    echo '未收到';
                                } ?></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <code>使用积分</code>
                            </th>
                            <td><?php echo $shop_order->cost_integral?></td>
                            <th scope="row">
                                <code>积分抵扣金额</code>
                            </th>
                            <td><?php echo $shop_order->integral_money?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-title">
                    订单详情
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td>Id</td>
                            <td>商品名称</td>
                            <td>金额</td>
                            <td>实际金额</td>
                            <td>数量</td>
                            <td>是否折扣</td>
                            <td>折扣比例</td>
                            <td>是否积分兑换</td>
                            <td>消耗积分</td>
                            <td>获得积分</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($shop_order_details as $shop_order_detail) { ?>
                        <tr>
                            <td><?php echo $shop_order_detail->id ?></td>
                            <td><?php echo $shop_order_detail->belongsToWare->name ?></td>
                            <td><?php echo $shop_order_detail->money ?></td>
                            <td><?php echo $shop_order_detail->actual_money ?></td>
                            <td><?php echo $shop_order_detail->number ?></td>
                            <td><?php if($shop_order_detail->is_discount == 1){echo '是';}else {echo '否';} ?></td>
                            <td><?php echo $shop_order_detail->discount ?></td>
                            <td><?php if($shop_order_detail->is_integral == 1){echo '是';}else {echo '否';} ?></td>
                            <td><?php echo $shop_order_detail->cost_integral ?></td>
                            <td><?php echo $shop_order_detail->get_integral ?></td>
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


