<html>
<head>
    <title>我的聚美</title>
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="format-detection" content="telephone=no">
    <script src="https://secure2.jmstatic.com/static_lib/dist/20150525/mobile.min.js"></script>
    <script src="https://secure4.jmstatic.com/static_account/dist/20161025/js/boot.js"></script>
    <link href="https://secure4.jmstatic.com/static_account/dist/20161025/css/touch/upload.css" rel="stylesheet">
    <link href="https://secure0.jmstatic.com/static_account/dist/20161025/css/touch/dialog.css" rel="stylesheet">
</head>
<body>

<link href="https://secure3.jmstatic.com/static_account/dist/20161025/css/mobile_usercenter/myjumei.css"
      rel="stylesheet" style="zoom: 1.2875;">
<style style="zoom: 1.2875;">
    .user_info .name {
        font-family: sans-serif;
        line-height: 20px;
    }

    .ui-dialog-content {
        text-align: center;
    }

    .android .ui-dialog-content {
        padding: 30px 5px;
        min-height: 0;
    }
</style>

<link rel="stylesheet" href="https://secure5.jmstatic.com/static_account/dist/20161025/css/mobile_usercenter/header.css"
      style="zoom: 1.2875;">
<header class="head-wrap" style="zoom: 1.2875; display: block;">
    <div class="head-left"><a href="javascript:history.go(-1);">&nbsp;</a></div>
    <div class="head-title">我的聚美</div>
    <div class="head-right">
        <a href="http://m.jumei.com">&nbsp;</a>
    </div>
</header>
<script style="zoom: 1.2875;">
    seajs.use('mobile_usercenter/header');
</script>
<style style="zoom: 1.2875;">
    .head-wrap {
        zoom: 1;
        z-index: 1;
        background: transparent;
    }

    .head-title {
        background: transparent;
    }

    #wrapper {
        top: 0;
        position: absolute;
    }

    .user-unlogin {
        padding-top: 50px;
    }
</style>

<div id="wrapper" style="zoom: 1.2875; display: block;">
    <!-- 已登录 -->
    <div class="user">
        <img src="http://images2.jumei.com/user_avatar/113/880/113880755-64.png?1476096217?1477639359" alt=""
             class="photo">
        <div class="user_bg">
            <div class="user_info">
                <span class="name">JM183BCXN4184</span>
                <span class="grade">普通会员</span>
            </div>
        </div>
        <div class="icons">
            <a class="wishlist" href="/m/wishdeal/onsale">
                <div class="icon"></div>
                <span>心愿单</span>
            </a>
            <a class="onsale" href="/m/subscribe/list">
                <div class="icon"></div>
                <span>开售提醒</span>
            </a>
            <a class="fav" href="/m/favoritebrand/list">
                <div class="icon"></div>
                <span>收藏</span>
            </a>
        </div>
    </div>

    <div class="order block">
        <div class="block-title">
            <i class="block-title-icon myorder"></i>
            我的订单
            <a href="/m/order/list" class="block-title-nav">
                <span>查看我的全部订单</span>
                <i class="arrow-right"></i>
            </a>
        </div>
        <div class="block-content">
            <a class="block-item" href="/m/order/list?status=1">
                <i class="unpaid"></i>
                <span>待付款</span>
            </a>
            <a class="block-item" href="/m/order/list?status=2">
                <i class="unconfirm"></i>
                <span>待收货</span>
            </a>
            <a class="block-item" href="/m/order/list?status=3">
                <i class="uncomment"></i>
                <span>待评价</span>
            </a>
            <a class="block-item" href="/m/RMA/list">
                <i class="refund"></i>
                <span>退货/退款</span>
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
                <span>现金券</span>
            </a>
            <a class="block-item" href="/m/membership/show_red_envelope">
                <div class="value"></div>
                <span>红包</span>
            </a>
            <a class="block-item" href="/m/account/balance">
                <div class="value"></div>
                <span>聚美余额</span>
            </a>
            <a class="block-item" href="/m/giftcard/list">
                <div class="value"></div>
                <span>礼品卡</span>
            </a>
        </div>
    </div>
    <div class="block list">
        <a class="list-item" href="/m/RMA/service">
            <i class="list-item-icon rmaservice"></i>
            <span>售后服务</span>
            <i class="arrow-right"></i>
        </a>
        <a class="list-item" href="/m/feedback/show_add">
            <i class="list-item-icon feedback"></i>
            <span>意见反馈</span>
            <i class="arrow-right"></i>
        </a>
        <a class="list-item" href="/m/address/index">
            <i class="list-item-icon address"></i>
            <span>收货地址</span>
            <i class="arrow-right"></i>
        </a>
        <a class="list-item logout"
           href="http://passport.jumei.com/i/mobile/logout?redirect=http%3A%2F%2Fi.jumei.com%2Fm%2Faccount%2Fmy">
            <i class="list-item-icon logout"></i>
            <span>退出登录</span>
            <i class="arrow-right"></i>
        </a>
        <a class="list-item" href="tel: 400-123-8888">
            <i class="list-item-icon tel"></i>
            <span>400-123-8888</span>
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
<!-- ga -->
<script style="zoom: 1.2875;">
    $(function () {
        //ga
        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = 'https://secure1.jmstatic.com/static_account/dist/20161025/js/library/dc.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);

        })();
        //baidu
        window._hmt = window._hmt || [];
        (function () {
            var baidu_tongji = document.createElement('script');
            baidu_tongji.type = 'text/javascript';
            baidu_tongji.async = 'async';
            baidu_tongji.setAttribute('async', 'async');
            baidu_tongji.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'hm.baidu.com/h.js?884477732c15fb2f2416fb892282394b';
            var s = document.getElementsByTagName('body')[0];
            s.appendChild(baidu_tongji);
        })();
    });

    /*var agent = navigator.userAgent;
     var JMWebView = {};
     JMWebView.loadsuccessjs = function(param){
     if (agent.indexOf("iPhone") > -1) {
     window.location.href = 'jmweb://loadsuccess?' + param;
     } else {
     try{
     JMWebViewAndroid.loadsuccess(param);
     }catch(e){
     // throw new error("版本过低");
     }
     }
     };
     if(agent.indexOf("jumei") > -1){
     JMWebView.loadsuccessjs(window.location.href);
     }*/
</script>


<div class="gmu-media-detect" id="gmu-media-detect0" style="zoom: 1.2875;"></div>
<script type="text/javascript" async="async" src="https://ssl.google-analytics.com/ga.js"
        style="zoom: 1.2875;"></script>
<script type="text/javascript" async="async" src="https://hm.baidu.com/h.js?884477732c15fb2f2416fb892282394b"
        style="zoom: 1.2875;"></script>
<script type="text/javascript" async="async" src="https://hm.baidu.com/h.js?884477732c15fb2f2416fb892282394b"
        style="zoom: 1.2875;"></script>
<div class="ui-dialog element android" style="position: fixed;">
    <div class="ui-dialog-title">
        <div>提示</div>
        <div class="ui-dialog-close"></div>
    </div>
    <div class="ui-dialog-content">您确定要退出登录吗？</div>
    <div class="ui-dialog-btn">
        <div class="ui-dialog-cancel">我再想想</div>
        <div class="ui-dialog-ok">确定</div>
    </div>
</div>
<div class="ui-bg"></div>
</body>
</html>