<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="format-detection" content="telephone=no">
<!--    <script type="text/javascript" async="" src="/js/shop/user/dc.js"></script>-->
    <script src="/js/shop/user/mobile.min.js"></script>
    <script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/shop/user/index.js"></script>
    <link href="/css/shop/user/upload.css" rel="stylesheet">
    <link href="/css/shop/user/dialog.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/shop/common/common.css" style="zoom: 1.2875;">
    <link rel="stylesheet" href="/css/shop/user/checkorder.css" style="zoom: 1.2875;">
</head>
<body>
<?php include_once SHOP_COMMON; ?>
<div class="main-wrap" page-count="1" style="zoom: 1.2875;">
    <ul class="order-select">
        <li><a href="/shop/user/to_order">全部</a></li>
        <li><a href="/shop/user/to_order?type=1">待处理</a></li>
        <li><a href="/shop/user/to_order?type=2">已发货</a></li>
        <li><a href="/shop/user/to_order?type=3">已完成</a></li>
    </ul>
    <?php foreach ($orders as $order) { ?>
        <div class="order-list">
            <div class="order-info">
                <div class="list-ordernum">
                    <div class="ordernum-left">
                        <a href="/shop/user/to_order_detail?order_id=<?php echo $order->order_id?>">
                            交易单 <span class="order-num"><?php echo $order->order_id ?></span>
                            <!--不同的状态只需要给order-status添加不同的类名，待处理status-pending，已发货status-delivered，已过期status-expired-->
                            <?php if ($order->type == 1) { ?>
                                <span class="order-status  status-expired">待处理</span>
                            <?php } else if ($order->type == 2) { ?>
                                <span class="order-status status-pending">已发货</span>
                            <?php } else if ($order->type == 3) { ?>
                                <span class="order-status  status-delivered">已完成</span>
                            <?php } ?>
                        </a>
                    </div>
                </div>
            </div>
            <?php foreach ($order->hasManyOrderDetails as $hasManyOrderDetails) { ?>
                <a href="/shop/user/to_order_detail?order_id=<?php echo $order->order_id?>">
                    <div class="product-wrap clearfix">
                        <div class="list-product clearfix">
                            <div class="product-pic">
                                <img src="<?php echo $hasManyOrderDetails->belongsToWare->detail_img ?>"
                                     alt="<?php echo $hasManyOrderDetails->belongsToWare->name ?>">
                            </div>
                            <div class="product-info">
                                <p class="info-text"><?php echo $hasManyOrderDetails->belongsToWare->name ?></p>

                            </div>
                            <div class="product-price">
                                <div class="price">
                                    <?php if ($hasManyOrderDetails->is_integral == 1) {
                                        echo $hasManyOrderDetails->cost_integral . '积分';
                                    } else {
                                        echo '¥' . $hasManyOrderDetails->actual_money;
                                    } ?>
                                </div>
                                <div class="num-wrap">x<span class="num"><?php echo $hasManyOrderDetails->number ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>
            <div class="status-wrap">
                <?php echo '总花费：¥' . $order->actual_money?>
                <?php if ($order->type == 2) { ?>
                    <a class="repay-button status-btn" data-orderid="<?php echo $order->order_id ?>">确认收货</a>
                <?php } ?>
            </div>
            <div class="status-wrap" style="display: none;"></div>
            <div class="list-status"></div>
        </div>
    <?php } ?>
    <script>
        seajs.use('weizhi/list');
    </script>
</div>
<div class="gmu-media-detect" id="gmu-media-detect0" style="zoom: 1.2875;"></div>
</body>
</html>