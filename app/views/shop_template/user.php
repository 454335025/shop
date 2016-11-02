<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="format-detection" content="telephone=no">
    <script src="/js/shop/user/dc.js"></script>
    <script src="/js/shop/user/mobile.min.js"></script>
    <script src="/js/shop/user/boot.js"></script>
<!--    <script src="https://secure2.jmstatic.com/static_lib/dist/20150525/mobile.min.js"></script>-->
<!--    <script src="https://secure4.jmstatic.com/static_account/dist/20161025/js/boot.js"></script>-->
    <link href="/css/shop/user/upload.css" rel="stylesheet">
    <link href="/css/shop/user/dialog.css" rel="stylesheet">
    <link href="/css/shop/user/myjumei.css" rel="stylesheet">
    <link href="/css/shop/user/header.css" rel="stylesheet">
</head>
<body>
<header class="head-wrap" style="zoom: 1.2875; display: block;">
    <div class="head-left"><a href="javascript:history.go(-1);">&nbsp;</a></div>
    <div class="head-title"><?php echo $title ?></div>
    <div class="head-right">
        <a href="/shop?openid=<?php echo $user->openid ?>">&nbsp;</a>
    </div>
</header>
<div id="wrapper" style="zoom: 1.2875; display: block;">
    <!-- 已登录 -->
    <div class="user">
        <img src="http://images2.jumei.com/user_avatar/113/880/113880755-64.png?1476096217?1476177298" alt=""
             class="photo">
        <div class="user_bg">
            <div class="user_info">
                <span class="name"><?php echo $user->username; ?></span>
                <span class="grade"><?php echo $user_type->type ;?></span>
            </div>
        </div>
    </div>

    <div class="order block">
        <div class="block-title">
            <i class="block-title-icon myorder"></i>
            我的订单
            <a href="/m/order/list" class="block-title-nav">
                <span>查看我的全部订单</span>
                <i class="arrow-right"></i>
            </a>
        </div>
        <div class="block-content">
            <!--<a class="block-item" href="/m/order/list?status=1">-->
                <!--<i class="unpaid"></i>-->
                <!--<span>待付款</span>-->
            <!--</a>-->
            <a class="block-item" href="/m/order/list?status=2">
                <i class="unconfirm"></i>
                <span>待收货</span>
            </a>
            <!--<a class="block-item" href="/m/order/list?status=3">-->
                <!--<i class="uncomment"></i>-->
                <!--<span>待评价</span>-->
            <!--</a>-->
            <!--<a class="block-item" href="/m/RMA/list">-->
                <!--<i class="refund"></i>-->
                <!--<span>退货/退款</span>-->
            <!--</a>-->
        </div>
    </div>
    <div class="fund block">
        <div class="block-title">
            <i class="block-title-icon myfund"></i>
            我的资产
        </div>
        <div class="block-content">
            <a class="block-item" href="/m/membership/show_promocards">
                <div class="value"></div>
                <span>积分：<?php echo $user->integral ?></span>
            </a>
            <!--<a class="block-item" href="/m/membership/show_red_envelope">-->
                <!--<div class="value"></div>-->
                <!--<span>红包</span>-->
            <!--</a>-->
            <!--<a class="block-item" href="/m/account/balance">-->
                <!--<div class="value"></div>-->
                <!--<span>聚美余额</span>-->
            <!--</a>-->
            <!--<a class="block-item" href="/m/giftcard/list">-->
                <!--<div class="value"></div>-->
                <!--<span>礼品卡</span>-->
            <!--</a>-->
        </div>
    </div>
    <div class="block list">
        <!--<a class="list-item" href="/m/RMA/service">-->
            <!--<i class="list-item-icon rmaservice"></i>-->
            <!--<span>售后服务</span>-->
            <!--<i class="arrow-right"></i>-->
        <!--</a>-->
        <!--<a class="list-item" href="http://m.jumei.com/i/MobileWap/message">-->
            <!--<i class="list-item-icon feedback"></i>-->
            <!--<span>意见反馈</span>-->
            <!--<i class="arrow-right"></i>-->
        <!--</a>-->
        <a class="list-item" href="/m/address/index">
            <i class="list-item-icon address"></i>
            <span>收货地址</span>
            <i class="arrow-right"></i>
        </a>
        <!--<a class="list-item logout"-->
           <!--href="http://passport.jumei.com/i/mobile/logout?redirect=http%3A%2F%2Fi.jumei.com%2Fm%2Faccount%2Fmy">-->
            <!--<i class="list-item-icon logout"></i>-->
            <!--<span>退出登录</span>-->
            <!--<i class="arrow-right"></i>-->
        <!--</a>-->
        <a class="list-item" href="tel: 400-123-8888">
            <i class="list-item-icon tel"></i>
            <span>400-123-8888</span>
            <i class="arrow-right"></i>
        </a>
    </div>
    <div class="hint">
        客服全天24小时在线，拨打前请记录您的UID 113880755
    </div>
</div>

</body>
</html>
