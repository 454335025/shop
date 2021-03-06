<!DOCTYPE html>
<html>
<head>
    <title>新增地址</title>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="format-detection" content="telephone=no">
<!--    <script type="text/javascript" async="" src="/js/shop/user/dc.js"></script>-->
    <script src="/js/shop/user/mobile.min.js"></script>
    <script src="/js/shop/user/boot.js"></script>
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
<?php require SHOP_COMMON; ?>

<div id="wrapper" style="zoom: 1.2875; display: block;">
    <form method="post">
        <div class="form">
            <div class="input-wrapper">
                <label>* 收货人</label>
                <input type="text" class="name" id="realname" name="realname" placeholder="请输入收货人姓名">
            </div>
            <div class="input-wrapper">
                <label>* 手机号码</label>
                <input type="text" class="tel" id="phone" name="phone" placeholder="请输入收货人手机号">
            </div>
            <div class="input-wrapper">
                <label>&nbsp;&nbsp;&nbsp;身份证</label>
                <input type="text" class="idcard" id="bio" name="bio" placeholder="请输入收货人身份证号">
            </div>
            <div class="input-wrapper">
                <label>* 街道地址</label>
                <input type="text" class="address" id="address" name="address" placeholder="请输入详细地址">
            </div>
        </div>
        <div class="btn-add btn-block" id="addUserAddress">保存</div>
    </form>
</div>
</body>
</html>