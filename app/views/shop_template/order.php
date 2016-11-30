<!DOCTYPE html>
<html lang="en" style="font-size: 18.56px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate,max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <meta name="full-screen" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title><?php echo $title; ?></title>
    <script type="text/javascript">
        document.documentElement.style.fontSize = Math.min(screen.width, document.documentElement.getBoundingClientRect().width) / 750 * 32 + 'px'
    </script>
    <script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/js/shop/order/index.js"></script>
    <link href="<?php echo STATIC_COMMON; ?>/css/shop/common/common.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo STATIC_COMMON; ?>/css/shop/order/confirm.css">
</head>
<body>
<?php include_once SHOP_COMMON; ?>
<br/>
<br/>
<div class="page" style="top:50px">
    <div class="content">
        <?php foreach ($user->hasManyUserAddresses->sortByDesc('isdefault')->take(1) as $hasManyUserAddress) { ?>
            <div class="address-box">
                <span class="location-icon"></span>
                <div class="addr-text">
                    <div class="per-info"> 收货人：
                        <span><?php echo $hasManyUserAddress->realname ?></span>
                        <span class="per-tel"><?php echo $hasManyUserAddress->phone ?></span>
                    </div>
                    <div class="address-detail"><?php echo $hasManyUserAddress->address ?></div>
                </div>
                <span class="right-arrow"
                      onclick="javascript:window.location.href='/shop/order/to_address_update'"></span>
            </div>
        <?php } ?>

        <div class="order-groups">
            <div class="order-group">
                <div class="group-head">
                    <span class="store-icon"></span> <span class="store-info">旗舰店发货</span></div>
                <?php foreach ($user->hasManyShopCarts as $hasManyShopCart) { ?>
                    <div class="product-items">
                        <div class="product-item">
                            <img class="item-img" src="<?php echo $hasManyShopCart->belongsToWare->detail_img ?>">
                            <div class="item-info">
                                <div class="item-info-1">
                                        <span class="item-title">
                                            <!--<span class="red">[极速免税]</span>-->
                                            <?php echo $hasManyShopCart->belongsToWare->name ?>
                                        </span>
                                    <span
                                        class="item-price" style="width: ;">

                                        <?php if ($hasManyShopCart->belongsToWare->is_integral == 1) {
                                            echo $hasManyShopCart->belongsToWare->cost_integral . '积分';

                                        } else {
                                            if ($hasManyShopCart->belongsToWare->is_discount == 1) {
                                                echo '¥' . $hasManyShopCart->belongsToWare->money . 'x' . $user->hasOneUserType->discount;
                                            } else {
                                                echo '¥' . $hasManyShopCart->belongsToWare->money;
                                            }
                                        } ?></span>
                                </div>
                                <div class="item-info-2">
                                    <span>&nbsp;</span>
                                    <span>x<?php echo $hasManyShopCart->number ?>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="group-stat">
                    <!--                    <div class="stat-nav">-->
                    <!--                        <div>运费</div>-->
                    <!--                        <div class="freight-info">-->
                    <!--                            <div class="fre-info-1">快递：¥5</div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <div class="stat-nav">
                        <div class="nav-center">
                            <span>我的积分</span>
                            <?php if ($user->integral <= 0) { ?>
                                <span class="no-select-tag">暂无可用</span>
                            <?php } else { ?>
                                <span class="no-select-tag"><?php echo $surplus_integral ?>积分</span>
                            <?php } ?>
                        </div>
                        <div>
                            <span>
                                <input type="checkbox"
                                    <?php if ($surplus_integral < $user->hasOneUserType->min_integral) { ?>
                                        disabled="disabled"
                                    <?php } ?>
                                       id="is_use" name="is_use">
                                使用
                            </span>
                        </div>
                    </div>
                    <div class="stat-nav">
                        <div class="nav-center">赠送积分</div>
                        <div class="notice-num"><?php echo $get_integral_count ?> 积分</div>
                    </div>
                    <div class="stat-nav">
                        <div class="nav-center">金额合计</div>
                        <div class="notice-num">
                            ¥<label id="cost_count"><?php echo $cost_count ?></label>
                        </div>
                    </div>
                    <div class="stat-nav">
                        <div class="nav-center">积分合计</div>
                        <div class="notice-num">
                            <?php echo $user->integral - $surplus_integral ?>积分
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="submit-box">
        <div class="order-stat">
            <div class="stat-count">
                共 <?php echo $user->hasManyShopCarts->sum('number') ?> 件商品
            </div>
            <div class="stat-sum">合计
                <span>
                    ¥<label id="cost_count1">
                        <?php echo $cost_count ?>
                    </label>
                    +<?php echo $user->integral - $surplus_integral ?>积分
                </span>
            </div>
        </div>
        <button type="button">提交订单</button>
    </div>
</div>
</body>
</html>