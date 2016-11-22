<!DOCTYPE html>
<html lang="en" style="font-size: 18.56px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate,max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <meta name="full-screen" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title><?php echo $title;?></title>
    <script type="text/javascript">
        document.documentElement.style.fontSize = Math.min(screen.width, document.documentElement.getBoundingClientRect().width) / 750 * 32 + 'px'
    </script>
    <script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/js/shop/order/index.js"></script>
<!--    <link href="--><?php //echo STATIC_COMMON; ?><!--/css/shop/common/header.css" rel="stylesheet" type="text/css">-->
    <link rel="stylesheet" href="//p2.jmstatic.com/static/static_cart_mobile/css/confirm/confirm_91e237f5.css">
</head>
<body>
<?php include_once SHOP_COMMON; ?>
<div class="page">
    <div class="content">
        <?php foreach ($user->hasManyUserAddresses->sortByDesc('isdefault')->take(1) as $hasManyUserAddress){?>
            <div class="address-box">
                <span class="location-icon"></span>
                <div class="addr-text">
                    <div class="per-info"> 收货人：
                        <span><?php echo $hasManyUserAddress->realname?></span>
                        <span class="per-tel"><?php echo $hasManyUserAddress->phone?></span>
                    </div>
                    <div class="address-detail"><?php echo $hasManyUserAddress->address?></div>
                </div>
                <span class="right-arrow" onclick="javascript:window.location.href='/shop/order/to_address_update'"></span>
            </div>
        <?php } ?>

        <div class="order-groups">
            <div class="order-group">
                <div class="group-head">
                    <span class="store-icon"></span> <span class="store-info">旗舰店发货</span></div>
                    <?php foreach ($user->hasManyShopCarts as $hasManyShopCart){?>
                        <div class="product-items">
                            <div class="product-item">
                                <img class="item-img" src="<?php echo $hasManyShopCart->belongsToWare->detail_img ?>">
                                <div class="item-info">
                                    <div class="item-info-1">
                                        <span class="item-title">
<!--                                            <span class="red">[极速免税]</span>-->
                                            <?php echo $hasManyShopCart->belongsToWare->name ?>
                                        </span>
                                        <span class="item-price">¥<?php echo $hasManyShopCart->belongsToWare->money ?></span>
                                    </div>
                                    <div class="item-info-2">
                                        <span>&nbsp;</span>
                                        <span>x<?php echo $hasManyShopCart->number ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                <div class="group-stat">
<!--                    <div class="stat-nav">-->
<!--                        <div>运费</div>-->
<!--                        <div class="freight-info">-->
<!--                            <div class="fre-info-1">快递：¥5</div>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="stat-nav">
                        <div class="nav-center"><span>现金券</span> <span class="no-select-tag">暂无可用</span></div>
                        <div><span>使用现金券<span class="right-arrow-icon"></span></span></div>
                    </div>
                    <div class="stat-nav">
                        <div class="nav-center">合计</div>
                        <div class="notice-num">¥<?php echo $cost_count?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="submit-box">
        <div class="order-stat">
            <div class="stat-count">共 <?php echo $user->hasManyShopCarts->sum('number')?> 件商品</div>
            <div class="stat-sum">合计 <span>¥<?php echo $cost_count?></span></div>
        </div>
        <button type="button">提交订单</button>
    </div>
</div>
</body>
</html>