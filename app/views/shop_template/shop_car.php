<html style="font-size: 20.6px; display: block;">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" id="viewport"
          content="width=320,user-scalable=no,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
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

<section id="touch-cart-container" class="touch-cart-container">
    <div class="message"></div>
    <!--购物车列表-->
    <section id="cart-deals-list" class="cart-deals-list">
        <ul>
            <?php foreach ($shop_carts as $shop_cart) { ?>
                <li>
                    <a class="product-img" href="/shop/ware?ware_id=<?php echo $shop_cart->ware_id ?>">
                        <img src="<?php echo $shop_cart->belongsToWare->detail_img ?>"
                             title="<?php echo $shop_cart->belongsToWare->name ?>">
                    </a>
                    <div class="clear cart-info">
                        <div class="cart-title clear">
                            <div class="info-left fl">
                                <div class="main-title new-cart-title">
                                    <?php echo $shop_cart->belongsToWare->name; ?>
                                </div>
                                <div class="sub-title new-cart-title"></div>
                            </div>
                            <div class="fr price-list">
                                <div class="sale-price">
                                    <?php if ($shop_cart->belongsToWare->is_integral == 1) {
                                        echo $shop_cart->belongsToWare->cost_integral . '积分';
                                    } else {
                                        if ($shop_cart->belongsToWare->is_discount == 1) {
                                            echo '￥' . $shop_cart->belongsToWare->money . 'x' . $user->hasOneUserType->discount;
                                        } else {
                                            echo '￥' . $shop_cart->belongsToWare->money;
                                        }
                                    } ?>
                                </div>
                            </div>
                        </div>

                        <div class="cart-bar">
                            <div class="num-count fl">
                                <input type="hidden" name="type" class="type" value="jumei_mall">
                                <input type="hidden" name="item_key" class="item-key" value="1071454_">

                                <?php if ($shop_cart->number > 1) { ?>
                                    <a class="btn-sub  btn-sub-select  fl" href="javascript:update_ware(<?php echo $shop_cart->id ?>,'sub',1)"></a>
                                <?php } else { ?>
                                    <a class="btn-sub  fl"></a>
                                <?php } ?>
                                <input type="text" name="item-quantity" value="<?php echo $shop_cart->number ?>"
                                       class="show-count quantity fl"
                                       readonly="readonly"
                                       data-price="<?php echo $shop_cart->belongsToWare->money ?>"
                                       data-restriction="0">
                                <a class="btn-add btn-add-select fl"
                                   href="javascript:update_ware(<?php echo $shop_cart->id ?>,'add',1)"></a>
                            </div>
                            <div class="opt fr">
                                <a class="cart-del"
                                   href="javascript:del_ware('<?php echo $shop_cart->id ?>');"></a>
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
<script>
    seajs.use('weizhi/list');
</script>
<footer class="touch-footer"></footer>

<script type="text/javascript" src="<?php echo STATIC_COMMON; ?>/js/jquery-3.1.1.min.js"></script>


<script type="text/javascript" src="/js/shop/shop_car/ui.js"></script>
<script type="text/javascript" src="/js/shop/common/index_main.js"></script>
<script type="text/javascript" src="/js/shop/shop_car/shop_car.js"></script>

<div class="gmu-media-detect" id="gmu-media-detect0"></div>
</body>
</html>