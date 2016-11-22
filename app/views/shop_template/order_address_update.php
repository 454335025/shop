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
    <title><?php echo $title?></title>
    <script type="text/javascript">
        document.documentElement.style.fontSize = Math.min(screen.width, document.documentElement.getBoundingClientRect().width) / 750 * 32 + 'px'
    </script>
    <link rel="stylesheet" href="/css/shop/common/common.css" style="zoom: 1.2875;">
    <link rel="stylesheet" href="//p2.jmstatic.com/static/static_cart_mobile/css/address/list_99d88a82.css">
    <script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/js/shop/order/index.js"></script>
</head>
<body>
<?php include_once SHOP_COMMON; ?>
<div class="items">
    <?php foreach ($user->hasManyUserAddresses->sortByDesc('isdefault') as $hasManyUserAddress){?>
    <div class="item-outer">
        <div class="item">
            <div class="left">
                <?php if($hasManyUserAddress->isdefault == 1){?><span class="icon-checked" id="<?php echo $hasManyUserAddress->id?>"></span>
                <?php }else{?>
                <span class="icon-unchecked" id="<?php echo $hasManyUserAddress->id?>"></span>
                <?php }?>
            </div>
            <div class="info">
                <div class="name-and-phone">
                    <div class="name"><?php echo $hasManyUserAddress->realname?></div>
                    <div class="phone"><?php echo $hasManyUserAddress->phone?></div>
                </div> <div class="address"><?php echo $hasManyUserAddress->address?></div>
            </div>
<!--            <div class="right">-->
<!--                <span class="icon-edit"></span>-->
<!--            </div>-->
        </div>
    </div>
    <?php }?>
</div>
<!--<div class="tips">最多保存10个有效地址。每月只能新增或修改10次。您本月已新增或修改0次</div>-->
<footer>
    <button type="button" onclick="window.location.href='/shop/user/to_address_add';">新增地址</button>
</footer>
</body>
</html>