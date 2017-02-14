<html>
<head>
    <title>订单详情</title>
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="format-detection" content="telephone=no">
    <script src="/js/shop/user/mobile.min.js"></script>
    <script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
    <style>.gmu-media-detect {
            -webkit-transition: width 0.001ms;
            width: 0;
            position: absolute;
            clip: rect(1px, 1px, 1px, 1px);
        }

        @media screen and (width: 412px) {
            #gmu-media-detect0 {
                width: 1px;
            }
        }
        .status-btn{
            float: right;
            margin-right: 10px;
            padding: 0 10px;
            border: 1px solid #E0E0E0;
            font-size: 12px;
            height: 26px;
            line-height: 26px;
            margin-top: 2px;
            margin-bottom: 8px
        }
    </style>
    <link href="/css/shop/user/upload.css" rel="stylesheet">
    <link href="/css/shop/user/dialog.css" rel="stylesheet">
    <link href="/css/shop/user/orderdetail.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/shop/common/common.css" style="zoom: 1.2875;">
</head>
<body>
<?php include_once SHOP_COMMON; ?>

<div class="main-wrap" style="zoom: 1.2875;">
    <div class="orderlist-wrap">
        <ul class="order-wrap">
            <li>
                <div class="order-title">交易单号</div>
                <div class="order-content"><span class="order-no"><?php echo $order->order_id ?></span></div>
            </li>
            <li>
                <div class="order-title">订单状态</div>
                <div class="order-content">
                    <span class="order-status">
                        <?php switch ($order->type) {
                            case '1':
                                echo '待处理';
                                break;
                            case '2':
                                echo '已发货';
                                break;
                            case '3':
                                echo '已完成';
                                break;
                            default:
                                echo '未知';
                        } ?></span>
                </div>
            </li>
            <li>
                <div class="order-title">下单时间</div>
                <div class="order-content"><span><?php echo $order->created_at ?></span></div>
            </li>
            <li>
                <div class="order-title">收货信息</div>
                <div class="order-content">
                    <div class="reciever-info">
                        <div class="info-name"><?php echo $order->belongsToUserAddress->realname ?></div>
                        <div class="info-tel"><?php echo $order->belongsToUserAddress->phone ?></div>
                    </div>
                    <p class="infor-address">
                        <?php echo $order->belongsToUserAddress->address ?></p>
                </div>
            </li>
        </ul>
    </div>
    <div class="orderlist-wrap">
        <ul class="item-wrap">
            <?php foreach ($order->hasManyOrderDetails as $hasManyOrderDetail) { ?>
                <li>
                    <a href="">
                        <div class="product-list">
                            <div class="list-left">
                                <img src="<?php echo $hasManyOrderDetail->belongsToWare->main_img ?>" alt="">
                            </div>
                            <div class="list-center">
                                <p class="product-info"><?php echo $hasManyOrderDetail->belongsToWare->name ?></p>
                            </div>
                            <div class="list-right">
                                <p class="product-price">￥<?php echo $hasManyOrderDetail->actual_money ?></p>
                                <p class="product-num">x<?php echo $hasManyOrderDetail->number ?></p>
                            </div>
                        </div>
                    </a>
                </li>
            <?php } ?>
            <li>
            </li>
        </ul>
    </div>
    <div class="orderlist-wrap">
        <ul class="item-wrap" style="margin-top: 0px;border-top:none;">
            <li>
                <div class="cost-wrap">
                    <div class="cost-left">商品总金额</div>
                    <div class="cost-right">￥<?php echo $order->money ?></div>
                </div>
                <div class="cost-wrap">
                    <div class="cost-left">应付款</div>
                    <div class="cost-right cost-color">￥<?php echo $order->actual_money ?></div>
                </div>
            </li>
        </ul>
    </div>
    <div class="orderlist-wrap">
        <select class="status-btn">
            <option>原因1</option>
            <option>原因2</option>
            <option>原因3</option>
            <option>原因4</option>
        </select>
        <a class="status-btn" data-orderid="<?php echo $order->order_id ?>">取消订单</a>
    </div>

    <div class="operation-wrap-placeholder" style="height: 65px"></div>
    <div class="operation-wrap">
        <ul class="item-wrap">
        </ul>
    </div>
    <div class="mask"></div>
</div>
<script>
    seajs.use('weizhi/list');
</script>


<div class="gmu-media-detect" id="gmu-media-detect0" style="zoom: 1.2875;"></div>
</body>
</html>