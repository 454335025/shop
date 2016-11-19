<!DOCTYPE html>
<html>
<head>
    <title>管理收货地址</title>
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="format-detection" content="telephone=no">
    <script type="text/javascript" async="" src="/js/shop/user/dc.js"></script>
    <script src="/js/shop/user/mobile.min.js"></script>
    <script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/shop/user/index.js"></script>
    <link href="/css/shop/user/upload.css" rel="stylesheet">
    <link href="/css/shop/user/dialog.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/shop/common/common.css" style="zoom: 1.2875;">
    <link rel="stylesheet" href="/css/shop/user/address.css" style="zoom: 1.2875;">
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
<body>
<?php include_once SHOP_COMMON; ?>

<div id="wrapper" style="zoom: 1.2875; display: block;">
    <div class="addresses">
        <?php foreach ($user_addresses as $user_address ) { ?>
            <div class="address-item clearfix">
                <div>
                    <span class="name"><?php echo $user_address->realname;?></span>
                    <span class="tel"><?php echo $user_address->phone;?></span>
                </div>
                <div class="address ellipsis"><?php echo $user_address->address;?></div>
                <div class="idcard">
                    <span>身份证 <?php echo $user_address->bio;?></span>
                    <i class="nameauth"></i>
                </div>
                <div class="btn-delete" onclick="javascript:deleteUserAddress(<?php echo $user_address->id;?>)"></div>
            </div>
        <?php } ?>
    </div>
    <a class="btn-block" href="/shop/user/to_address_add">
        添加新地址
    </a>
</div>


<div class="gmu-media-detect" id="gmu-media-detect0" style="zoom: 1.2875;"></div>

</html>