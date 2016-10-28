<!DOCTYPE html>
<html style="font-size: 20.6px; display: block;">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" id="viewport"
          content="width=320,user-scalable=no,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <title><?php echo $title ?></title>
    <link href="/css/shop_car.css" rel="stylesheet" type="text/css">
</head>
<body style="width: 20rem;">
<?php require SHOP_COMMON; ?>
<section id="touch-cart-container" class="touch-cart-container">
    <div class="message"></div>
    <!--购物车列表-->
    <section id="cart-deals-list" class="cart-deals-list">
        <ul>
            <?php foreach ($shop_carts as $shop_cart) { ?>
                <li>
                    <a class="product-img" href="/shop/ware/detail?id=<?php echo $shop_cart->ware_id ?>">
                        <img src="<?php echo $shop_cart->ware->img ?>" title="<?php echo $shop_cart->ware->name ?>">
                    </a>
                    <div class="clear cart-info">
                        <div class="cart-title clear">
                            <div class="info-left fl">
                                <div class="main-title new-cart-title">
                                    <?php if (strlen($shop_cart->ware->name) > 8) {
                                        echo substr($shop_cart->ware->name, 0, 8);
                                    } else {
                                        echo $shop_cart->ware->name;
                                    } ?>
                                </div>
                                <div class="sub-title new-cart-title"></div>
                            </div>
                            <div class="fr price-list">
                                <div class="sale-price">￥<?php echo $shop_cart->ware->money ?></div>
                            </div>
                        </div>

                        <div class="cart-bar">
                            <div class="num-count fl">
                                <input type="hidden" name="type" class="type" value="jumei_mall">
                                <input type="hidden" name="item_key" class="item-key" value="1071454_">

                                <?php if ($shop_cart->number > 1) { ?>
                                    <a class="btn-sub  btn-sub-select  fl"
                                       href="/shop/shop_car/update_number?openid=<?php echo $user->openid ?>&id=<?php echo $shop_cart->id ?>&action=sub"></a>
                                <?php } else { ?>
                                    <a class="btn-sub  fl"></a>
                                <?php } ?>
                                <input type="text" name="item-quantity" value="<?php echo $shop_cart->number ?>"
                                       class="show-count quantity fl"
                                       readonly="readonly" data-price="<?php echo $shop_cart->ware->money ?>"
                                       data-restriction="0">
                                <a class="btn-add btn-add-select fl" href="/shop/shop_car/update_number?openid=<?php echo $user->openid ?>&id=<?php echo $shop_cart->id ?>&action=add"></a>
                            </div>
                            <div class="opt fr">
                                <a class="cart-del" href="javascript:del_ware('<?php echo $user->openid ?>','<?php echo $shop_cart->id ?>');"></a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </section>
</section>
<section class="touch-cart-fixed">
    <div class="cart-price fl">
        <div class="total-price">
            <span>总额(不含运费):</span>
            <span id="total_price" style="color:#9d5b35;" allprice="<?php echo $cost_count ?>">
                ￥<?php echo $cost_count ?>
            </span>
        </div>
    </div>
    <a id="touch-cart-confirm" href="/shop/statement" class="touch-cart-confirm fr">去结算</a>
    <form id="filterPostForm" action="/shop/statement" method="get">
        <input type="hidden" name="selected_item_keys" value="">
    </form>
</section>


<footer class="touch-footer"></footer>


<script type="text/javascript" src="/js/shop_car/jumei_cartlist.js"></script>
<script type="text/javascript" src="/js/shop_car/guide_download_main.js"></script>

<script type="text/javascript" src="/js/shop_car/ui.js"></script>
<script type="text/javascript" src="/js/shop_car/index_main.js"></script>
<script type="text/javascript" src="/js/shop_car/shop_car.js"></script>
<div id="loadding-img"
     style="display: none; z-index: 10000; position: absolute; width: 20px; height: 20px; left: 206px; top: 366px;"
     class="loadding">
    <img style="width:100%;display:block;" src="http://images.jumei.com/mobile/act/image/loadding/8.gif"></div>
<div class="gmu-media-detect" id="gmu-media-detect0"></div>
</body>
<script type="text/javascript">

</script>
</html>