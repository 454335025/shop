<html>
<head>
    <title>我的订单列表</title>
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="format-detection" content="telephone=no">
    <script type="text/javascript" src="https://secure0.jmstatic.com/static_account/dist/20161025/js/library/dc.js"></script>
    <script src="https://secure1.jmstatic.com/static_lib/dist/20150525/mobile.min.js"></script>
    <script src="https://secure0.jmstatic.com/static_account/dist/20161025/js/boot.js"></script>
    <link href="https://secure5.jmstatic.com/static_account/dist/20161025/css/touch/upload.css" rel="stylesheet">
    <link href="https://secure4.jmstatic.com/static_account/dist/20161025/css/touch/dialog.css" rel="stylesheet">
</head>
<body>

<link rel="stylesheet" href="https://secure4.jmstatic.com/static_account/dist/20161025/css/mobile_usercenter/common.css"
      style="zoom: 1.2875;">
<link rel="stylesheet" href="https://secure0.jmstatic.com/static_account/dist/20161025/css/mobile_usercenter/header.css"
      style="zoom: 1.2875;">
<link rel="stylesheet"
      href="https://secure0.jmstatic.com/static_account/dist/20161025/css/mobile_usercenter/checkorder.css"
      style="zoom: 1.2875;">
<?php require SHOP_COMMON; ?>
<input type="hidden" id="h5pay_url" value="https://carth5.jumei.com/api/order/pay_order" style="zoom: 1.2875;">
<div class="main-wrap" page-count="0" style="zoom: 1.2875;">
    <ul class="order-select">
        <li><a href="/m/order/list?status=all">全部</a></li>
        <!--        <li><a href="/m/order/list?status=1">待付款</a></li>-->
        <li><a href="/m/order/list?status=2">待收货</a></li>
        <!--        <li><a href="/m/order/list?status=3">待评价</a></li>-->
        <li><a href="/m/order/list?status=4">交易完成</a></li>
    </ul>
    <div class="order-list">
        <!--订单号-->
        <div class="order-info">
            <div class="list-ordernum">
                <div class="ordernum-left">
                    <a href="/m/order/detail/?order_id=803231562">
                        交易单 <span class="order-num">803231562</span>
                        <!--不同的状态只需要给order-status添加不同的类名，待处理status-pending，已发货status-delivered，已过期status-expired-->
                        <span class="order-status status-pending">等待付款</span>
                    </a>
                </div>
            </div>
        </div>
        <!--商品-->
        <a href="/m/order/detail/?order_id=803231562">
            <div class="product-wrap clearfix">
                <div class="list-product clearfix">
                    <div class="product-pic">
                        <img src="http://p4.jmstatic.com/product/000/014/14084_std/14084_60_60.jpg"
                             alt="欧莱雅男士控油炭爽抗黑头洁面膏 100ml">
                    </div>
                    <div class="product-info">
                        <p class="info-text">欧莱雅男士控油炭爽抗黑头洁面膏 100ml</p>
                        <div class="tab-wrap">
                            <span class="info-size">100ml</span>
                        </div>
                    </div>
                    <div class="product-price">
                        <div class="price">¥35.00</div>
                        <div class="num-wrap">x<span class="num">2</span></div>
                    </div>
                </div>
            </div>
        </a>
        <div class="status-wrap">
            <a class="repay-button status-btn" data-orderid="803231562">再次支付</a>
        </div>
        <div class="list-status">
            1123
        </div>
    </div>
</div>
</body>
</html>