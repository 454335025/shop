<html>
<head>
    <title><?php echo $title ?></title>
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="format-detection" content="telephone=no">
    <script src="/js/shop/user/mobile.min.js"></script>
    <script src="/js/shop/user/myjumei.js"></script>
    <link href="/css/shop/user/upload.css" rel="stylesheet">
    <link href="/css/shop/user/dialog.css" rel="stylesheet">
    <link href="/css/shop/user/myjumei.css" rel="stylesheet" style="zoom: 1.2875;">
    <link rel="stylesheet" href="/css/shop/user/header.css" style="zoom: 1.2875;">
    <link rel="stylesheet" href="/css/shop/user/index.css" style="zoom: 1.2875;">

</head>
<body>

<header class="head-wrap" style="zoom: 1.2875; display: block;">
    <div class="head-left"><a href="javascript:history.go(-1);">&nbsp;</a></div>
    <div class="head-title"><?php echo $title ?></div>
    <div class="head-right">
        <a href="/shop"></a>
    </div>
</header>
<div id="wrapper" style="zoom: 1.2875; display: block;">
    <!-- 已登录 -->
    <div class="user">
        <img src="http://images2.jumei.com/user_avatar/113/880/113880755-64.png?1476096217?1477639359" alt=""
             class="photo">
        <div class="user_bg">
            <div class="user_info">
                <span class="name"><?php echo $user->username; ?></span>
                <span class="grade"><?php echo $user->hasOneUserType->type ;?></span>
            </div>
        </div>
    </div>

    <div class="order block">
        <div class="block-title">
            <i class="block-title-icon myorder"></i>
            我的订单
            <a href="/shop/user/to_order" class="block-title-nav">
                <span>查看我的全部订单</span>
                <i class="arrow-right"></i>
            </a>
        </div>
        <div class="block-content">
            <a class="block-item" href="/shop/user/to_order?type=1">
                <i class="unconfirm"></i>
                <span>待处理</span>
            </a>
            <a class="block-item" href="/shop/user/to_order?type=2">
                <i class="unconfirm"></i>
                <span>待收货</span>
            </a>
            <a class="block-item" href="/shop/user/to_order?type=3">
                <i class="refund"></i>
                <span>已完成</span>
            </a>
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
        </div>
    </div>
    <div class="block list">
        <a class="list-item" href="###">
            <i class="list-item-icon rmaservice"></i>
            <span>售后服务</span>
            <i class="arrow-right"></i>
        </a>
        <a class="list-item" href="/shop/user/to_address">
            <i class="list-item-icon address"></i>
            <span>收货地址</span>
            <i class="arrow-right"></i>
        </a>
    </div>
    <div class="hint">
        客服全天24小时在线，拨打前请记录您的UID 113880755
    </div>
</div>
<script style="zoom: 1.2875;">
    seajs.use('mobile_usercenter/myjumei.js');
</script>


<div class="gmu-media-detect" id="gmu-media-detect0" style="zoom: 1.2875;"></div>
<div class="ui-bg"></div>
</body>
</html>