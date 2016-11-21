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
<!--    <link href="--><?php //echo STATIC_COMMON; ?><!--/css/shop/common/header.css" rel="stylesheet" type="text/css">-->
    <link rel="stylesheet" href="//p2.jmstatic.com/static/static_cart_mobile/css/confirm/confirm_91e237f5.css">
    <style type="text/css">
        .down-banner {
            height: 3.75rem;
            padding: 0 1.625rem 0 .625rem;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            border-bottom: 1px solid #eee;
            background: #fff;
            position: relative
        }

        .down-banner .logo {
            width: 2.5rem;
            height: 2.5rem;
            display: block
        }

        .down-banner div {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            padding-left: .625rem;
            font-size: .8125rem;
            line-height: 1.5
        }

        .down-banner a, .down-banner div p:first-child {
            font-size: .875rem
        }

        .down-banner a {
            width: 5rem;
            line-height: 2.25rem;
            text-align: center;
            color: #fff;
            border-radius: 1.125rem;
            background: #fe4070;
            display: block
        }

        .down-banner .close {
            width: .5625rem;
            height: .5625rem;
            position: absolute;
            top: .5625rem;
            right: .5rem;
            display: block
        }
    </style>
    <style type="text/css">
        .alert {
            position: fixed;
            bottom: 10.986rem;
            width: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            z-index: 999
        }

        .alert div {
            max-width: 18.4375rem;
            padding: .75rem 1.25rem;
            color: #fff;
            background: rgba(0, 0, 0, .5);
            border-radius: .3125rem
        }
    </style>
    <style type="text/css">
        .loading {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, .6);
            z-index: 999
        }

        .loading img {
            width: 7.0625rem;
            height: 6.875rem;
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -3.4375rem 0 0 -3.53125rem
        }
    </style>
</head>
<body>
<?php include_once SHOP_COMMON; ?>
<div class="page">
    <div class="content">
        <?php foreach ($user->hasManyUserAddresses->sortByDesc('isdefalut')->take(1) as $hasManyUserAddress){?>
            <div class="address-box">
                <span class="location-icon"></span>
                <div class="addr-text">
                    <div class="per-info"> 收货人：
                        <span><?php echo $hasManyUserAddress->realname?></span>
                        <span class="per-tel"><?php echo $hasManyUserAddress->phone?></span>
                    </div>
                    <div class="address-detail"><?php echo $hasManyUserAddress->address?></div>
                </div>
                <span class="right-arrow"></span>
            </div>
        <?php } ?>

        <div class="order-groups">
            <div class="order-group">
                <div class="group-head">
                    <span class="store-icon"></span> <span class="store-info">旗舰店发货</span></div>
                    <?php foreach ($user->hasManyShopCarts as $hasManyShopCart){?>
                        <div class="product-items">
                            <div class="product-item">
                                <img class="item-img" src="<?php echo $belongsToWare->detail_img ?>">
                                <div class="item-info">
                                    <div class="item-info-1">
                                        <span class="item-title">
<!--                                            <span class="red">[极速免税]</span>-->
                                            <?php echo $belongsToWare->name ?>
                                        </span>
                                        <span class="item-price">¥<?php echo $belongsToWare->money ?></span>
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
                    <div class="stat-nav">
                        <div>运费</div>
                        <div class="freight-info">
                            <div class="fre-info-1">快递：¥5</div>
                        </div>
                    </div>
                    <div class="stat-nav">
                        <div class="nav-center"><span>现金券</span> <span class="no-select-tag">暂无可用</span></div>
                        <div><span>使用现金券<span class="right-arrow-icon"></span></span></div>
                    </div>
                    <div class="stat-nav">
                        <div class="nav-center">合计</div>
                        <div class="notice-num">¥95</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="submit-box">
        <div class="order-stat">
            <div class="stat-count">共 1 件商品</div>
            <div class="stat-sum">合计 <span>¥95</span></div>
        </div>
        <button type="button">提交订单</button>
    </div>
</div>
</body>
</html>