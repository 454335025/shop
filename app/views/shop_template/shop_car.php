<html style="font-size: 20.6px; display: block;">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" id="viewport"
          content="width=320,user-scalable=no,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="聚美优品是国内知名正品女性团购网站,也是领先的品牌化妆品团购和护肤品团购网,聚美优品团购化妆品每天有超值的化妆品和护肤品团购信息.">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="full-screen" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-orientation" content="portrait">
    <title><?php echo $title ?></title>

    <link href="<?php echo STATIC_COMMON; ?>/css/shop/common/common.css" rel="stylesheet" type="text/css">
    <link href="<?php echo STATIC_COMMON; ?>/css/shop/shop_car/guide_download.css" rel="stylesheet" type="text/css">
    <link href="<?php echo STATIC_COMMON; ?>/css/shop/common/ui.css" rel="stylesheet" type="text/css">
    <link href="<?php echo STATIC_COMMON; ?>/css/shop/shop_car/index.css" rel="stylesheet" type="text/css">
    <link href="<?php echo STATIC_COMMON; ?>/css/shop/shop_car/portrait.css" rel="stylesheet">
    <link href="<?php echo STATIC_COMMON; ?>/css/shop/shop_car/landscape.css" rel="stylesheet">

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
    </style>
</head>
<body style="width: 20rem;">
<?php include_once SHOP_COMMON; ?>

<!--<div id="loadding-img" style="display:; z-index: 10000; position: absolute; width: 100%; height: 100%; background-color: gray;opacity: 0.5;" class="loadding">-->
    <section id="touch-cart-container" class="touch-cart-container">
        <div class="message"></div>
        <!--购物车列表-->
        <section id="cart-deals-list" class="cart-deals-list">
            <ul>
                <?php foreach ($user->hasManyShopCarts as $hasManyShopCart) { ?>
                    <li>
                        <a class="product-img" href="/shop/ware/detail?id=<?php echo $hasManyShopCart->ware_id ?>">
                            <img src="<?php echo $hasManyShopCart->belongsToWare->detail_img ?>" title="<?php echo $hasManyShopCart->belongsToWare->name ?>">
                        </a>
                        <div class="clear cart-info">
                            <div class="cart-title clear">
                                <div class="info-left fl">
                                    <div class="main-title new-cart-title">
                                        <?php if (strlen($hasManyShopCart->belongsToWare->name) > 8) {
                                            echo substr($hasManyShopCart->belongsToWare->name, 0, 8);
                                        } else {
                                            echo $hasManyShopCart->belongsToWare->name;
                                        } ?>
                                    </div>
                                    <div class="sub-title new-cart-title"></div>
                                </div>
                                <div class="fr price-list">
                                    <div class="sale-price">￥<?php echo $hasManyShopCart->belongsToWare->money ?></div>
                                </div>
                            </div>

                            <div class="cart-bar">
                                <div class="num-count fl">
                                    <input type="hidden" name="type" class="type" value="jumei_mall">
                                    <input type="hidden" name="item_key" class="item-key" value="1071454_">

                                    <?php if ($hasManyShopCart->number > 1) { ?>
                                        <a class="btn-sub  btn-sub-select  fl"
                                           href="/shop/shop_car/update_number?openid=<?php echo $user->openid ?>&id=<?php echo $hasManyShopCart->id ?>&action=sub&num=1"></a>
                                    <?php } else { ?>
                                        <a class="btn-sub  fl"></a>
                                    <?php } ?>
                                    <input type="text" name="item-quantity" value="<?php echo $hasManyShopCart->number ?>"
                                           class="show-count quantity fl"
                                           readonly="readonly"
                                           data-price="<?php echo $hasManyShopCart->belongsToWare->money ?>"
                                           data-restriction="0">
                                    <a class="btn-add btn-add-select fl"
                                       href="/shop/shop_car/update_number?openid=<?php echo $user->openid ?>&id=<?php echo $hasManyShopCart->id ?>&action=add&num=1"></a>
                                </div>
                                <div class="opt fr">
                                    <a class="cart-del"
                                       href="javascript:del_ware('<?php echo $user->openid ?>','<?php echo $hasManyShopCart->id ?>');"></a>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </section>
    </section>
<!--    <img style="width:100%;display:block;" src="http://images.jumei.com/mobile/act/image/loadding/8.gif">-->
<!--</div>-->
<section class="touch-cart-fixed">
    <div class="cart-price fl">

        <div class="total-price">
            <span>总额(不含运费):</span>
            <span id="total_price" style="color:#9d5b35;" allprice="<?php echo $cost_count ?>">
                ￥<?php echo $cost_count ?>
            </span>
        </div>
    </div>
    <a id="touch-cart-confirm" href="/shop/order" class="touch-cart-confirm fr">去结算</a>
</section>

<footer class="touch-footer"></footer>

<script type="text/javascript" src="/js/shop/shop_car/jumei_cartlist.js"></script>
<script type="text/javascript" src="/js/shop/common/guide_download_main.js"></script>

<script type="text/javascript" src="/js/shop/shop_car/ui.js"></script>
<script type="text/javascript" src="/js/shop/common/index_main.js"></script>
<script type="text/javascript" src="/js/shop/shop_car/shop_car.js"></script>

<div class="gmu-media-detect" id="gmu-media-detect0"></div>
</body>
</html>