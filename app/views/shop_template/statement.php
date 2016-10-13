<!DOCTYPE html>
<html style="font-size: 20.6px; display: block;">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" id="viewport"
          content="width=320,user-scalable=no,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <title>
        聚美优品触屏版
    </title>
    <link href="//a4.jmstatic.com/bc9a75e92b76bbfb/common.css" rel="stylesheet" type="text/css">
    <link href="//a0.jmstatic.com/955cd88e6683b859/guide_download.css" rel="stylesheet" type="text/css">

    <link href="//a4.jmstatic.com/11a635760971a464/ui.css" rel="stylesheet" type="text/css">
    <link href="//a1.jmstatic.com/0d13122fb02391f9/confirm.css" rel="stylesheet" type="text/css">

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


<header class="touch-header">
    <a href="shop_car.php" id="touch-header-back" class="touch-header-back">
    </a>

    <div class="touch-header-title">确认订单</div>
    <a class="touch-header-home" href="main.php">
    </a>
</header>


<div id="order-wrapper" class="order-wrapper">
    <form action="/cart/pay" method="post" id="check-pay-form" autocomplete="off" target="_blank">

        <!--地址部分-->
        <section class="order-item-group order-address">
            <div class="item-title">
                <img src="http://s1.jmstatic.com/templates/touch/css/v3/image/address.png" alt=""
                     class="order-item_icon">
                <span class="title">收货信息</span>
            </div>
            <a href="/address/add?type=&amp;itemKeys=" class="order-item  address-arrow">
                <div class="h2">填写收件地址</div>
                <input name="address_id" class="address_id" type="hidden" value="">
            </a>
            <a href="javascript:;" id="choose-time" class="order-item address-arrow" time="">
                <div class="h2">收货时间不限</div>
            </a>
        </section>

        <!--订单部分-->
        <section class="order-list order-item-group">
            <div class="item-title">
                <img src="http://s1.jmstatic.com/templates/touch/css/v3/image/order.png" alt="" class="order-item-icon">
                <span class="title"></span>

                <div class="send-address fr">聚美优品发货</div>
            </div>

            <div class="order-item clear">
                <div class="product-img">
                    <img src="http://p2.jmstatic.com/product/001/648/1648697_std/1648697_160_160.jpg"
                         alt="悦诗风吟（innisfree）绿茶精萃平衡护肤二重套装(平衡柔肤水200ml+平衡柔肤露160ml+平衡柔肤水15ml+平衡柔肤露15ml+平衡面霜10ml）"
                         title="悦诗风吟（innisfree）绿茶精萃平衡护肤二重套装(平衡柔肤水200ml+平衡柔肤露160ml+平衡柔肤水15ml+平衡柔肤露15ml+平衡面霜10ml）">
                </div>
                <div class="product-title">
                    悦诗风吟（innisfree）绿茶精萃平衡护肤二重套装(平衡柔肤水200ml+平衡柔肤露160ml+平衡柔肤水15ml+平衡柔肤露15ml+平衡面霜10ml）
                </div>
                <div class="product-num">2</div>
                <div class="product-price">￥230</div>
            </div>
            <div class="order-item clear">
                <div class="product-img">
                    <img src="http://p4.jmstatic.com/product/001/953/1953914_std/1953914_160_160.jpg"
                         alt="济州石榴活妍焕采护肤3件套" title="济州石榴活妍焕采护肤3件套">
                </div>
                <div class="product-title">
                    济州石榴活妍焕采护肤3件套
                </div>
                <div class="product-num">1</div>
            </div>

            <!--现金券-->
            <div class="order-item order-coupon">
                <a href="/promo/listforcart?cart_key=product/1570/&amp;delivery_fee=5&amp;address_id=&amp;type=&amp;itemKeys=">
                    使用现金券
                </a>
            </div>

            <!--红包-->
            <div class="order-item order-coupon">
                <a href="/Redenvelope/listforcart?cart_key=product/1570/&amp;delivery_fee=5&amp;address_id=&amp;type=&amp;itemKeys=">
                    使用红包
                </a>
            </div>
        </section>


        <!--结算金额部分-->
        <section class="order-money order-item-group">
            <div class="item-title">
                <img src="http://s1.jmstatic.com/templates/touch/css/v3/image/price.png" alt="" class="order-item_icon">
                <span class="title">结算金额</span>
            </div>
            <div class="order-item">
                <div class="product-label">商品总价</div>
                <div class="product-value">￥460</div>
            </div>
            <div class="order-item">
                <div class="product-label">合计运费</div>
                <div class="product-value">
                    ￥0
                    (已减免￥5)
                </div>
            </div>
            <div class="order-item">
                <div class="product-label">现金券</div>
                <div class="product-value">
                    ￥0
                </div>
            </div>
            <div class="order-item">
                <div class="product-label">红包</div>
                <div class="product-value">
                    ￥0
                </div>
            </div>
            <div class="order-item">
                <div class="product-label">还需支付</div>
                <div class="product-value">
                    <span class="red">￥460</span>
                </div>
            </div>
        </section>

        <!--支付方式-->
        <section class="order-item-group pay-type">
            <div class="item-title">
                <img src="http://s1.jmstatic.com/templates/touch/css/v3/image/card.png" alt="" class="order-item_icon">
                <span class="title">支付方式</span>
            </div>

            <div for="gateway-alipay" id="gateway-alipay" class="payitem order-item clear selected">
                <div class="pay-logo" style="display: inline-block;">
                    <img src="http://p0.jmstatic.com/mobile/touch/Image/pay/zhifubao.png"
                         style="width: 28px; height: 28px;">
                </div>
                <div class="pay-right" style="margin-left: 5px; display: inline-block;">
                    <div class="pay-text">
                        <p class="pay-t1" style="font-size: 14px;">支付宝</p>
                        <p class="pay-t2" style="font-size: 11px; color: #999">支付最便捷，可银行卡支付</p>
                    </div>
                </div>
                <div class="check-box fr">
                    <input id="gateway-alipay" checked="checked" type="radio" name="gateway" value="AlipayMobileWap">
                </div>
            </div>
        </section>
        <input name="items" id="items" type="hidden" value="">

        <!--提交按钮-->
        <section class="bottom-fixed submit-btn-wrapper">
            <div class="cart-price fl">
                <div class="total-price-txt">
                    <span>总额：</span>
                    <span id="total-price" class="total-price" allprice="460">￥460</span>
                </div>
            </div>
            <a class="go-check-out fr">
                <input type="button" class="" value="提  交" id="go-payfor">
            </a>
        </section>


        <!--选择收货日期-->
        <section class="choose-send-way order-item-group">
            <div class="send-ways">
                <div class="btn-bar order-item clear">
                    <a href="javascript:;" class="cancel fl" id="cancel">取消</a>
                    <a href="javascript:;" class="sure fr" id="sure">确定</a>
                </div>
                <div class="send-way order-item selected">
                    <input id="delivery-day-none" name="prefer-delivery-day" type="radio" value="">
                    <label>收货时间不限</label>
                </div>
                <div class="send-way order-item">
                    <input id="delivery-day-weekday" name="prefer-delivery-day" type="radio" value="weekday">
                    <label>仅工作日收货</label>
                </div>
                <div class="send-way order-item">
                    <input id="delivery-day-weekend" name="prefer-delivery-day" type="radio" value="weekend">
                    <label>仅双休与节假日收货</label>
                </div>
            </div>
        </section>
        <input type="hidden" value="" id="platform" name="platform">
    </form>
</div>
<div class="address-item-wrapper clearfix">
    <ul class="address-list-box">
        <li address-id="0" class=" address-item">
            <div class="h2">
                <span class="name" style="margin-right:5px">0</span>
                <span class="telephone">0</span>
            </div>
            <div class="address">0</div>
            <div class="address-edit">编辑</div>
        </li>
        <li address-id="" class="selected address-item">
            <div class="h2">
                <span class="name" style="margin-right:5px"></span>
                <span class="telephone"></span>
            </div>
            <div class="address"></div>
            <div class="address-edit">编辑</div>
        </li>
        <li address-id="s" class=" address-item">
            <div class="h2">
                <span class="name" style="margin-right:5px">s</span>
                <span class="telephone">s</span>
            </div>
            <div class="address">s</div>
            <div class="address-edit">编辑</div>
        </li>
        <li address-id="" class="selected address-item">
            <div class="h2">
                <span class="name" style="margin-right:5px"></span>
                <span class="telephone"></span>
            </div>
            <div class="address"></div>
            <div class="address-edit">编辑</div>
        </li>
    </ul>
    <li class="add-address-box">
        添加地址
    </li>
</div>
<footer class="touch-footer">

</footer>


<script charset="utf-8"
        src="http://trust.baidu.com/vcard/v.js?siteid=712872&amp;url=http%3A%2F%2Fh5.jumei.com%2Fcart%2Fconfirmation%3Ftype%3D&amp;source=&amp;rnd=577226417&amp;hm=1"></script>
<script type="text/javascript" src="//a1.jmstatic.com/74f6482e47f04c43/jumei.js"></script>
<script type="text/javascript" src="//a2.jmstatic.com/9381f90a01d9136c/guide_download_main.js"></script>

<script type="text/javascript" src="//a4.jmstatic.com/ef38d3a8036e8796/ui.js"></script>
<script type="text/javascript" src="//a1.jmstatic.com/6fed7fc59c4db99d/confirm_main.js"></script>
<div id="loadding-img"
     style="display: none; z-index: 10000; position: absolute; width: 20px; height: 20px; left: 206px; top: 366px;"
     class="loadding"><img style="width:100%;display:block;"
                           src="http://images.jumei.com/mobile/act/image/loadding/8.gif"></div>
<script>
    $(function () {
        $(".weiCard").click(function () {
            var cart_key = $(this).parent(".order-coupon").data("cartkey");
            var type = $(this).parent(".order-coupon").data("type");
            $.ajax({
                url: '/activity/weixin/getweixinjscardsign?wechat_card_js=1',
                type: 'get',
                dataType: 'json',
                success: function (data) {
                    if (data) {
                        if (data.code == 1) {
                            var readyFunc = function onBridgeReady() {
                                // 绑定关注事件 document.querySelector('#chooseCard').addEventListener('click', function(e) {
                                WeixinJSBridge.invoke('chooseCard',
                                        data.result,
                                        function (res) {
                                            var s = '';
                                            var list = $.parseJSON(res.choose_card_info);
                                            for (var i = 0; i < list.length; i++) {
                                                s = list[i].encrypt_code;
                                            }
                                            $.ajax({
                                                url: '/promo/use',
                                                data: {
                                                    cart_key: cart_key,
                                                    type: type,
                                                    cardno: s,
                                                    wechat_card_js: 1
                                                },
                                                dataType: 'json',
                                                type: 'get',
                                                success: function (result) {
                                                    if (result.result == 1) {
                                                        location.reload();
                                                    } else {
                                                        alert(result.message);
                                                    }
                                                }
                                            })
                                        })

                            }
                            if (typeof WeixinJSBridge === "undefined") {
                                document.addEventListener('WeixinJSBridgeReady', readyFunc, false);
                            } else {
                                readyFunc();
                            }
                        }
                    }
                },
                error: function () {
                    console.log('网络错误');
                }
            });
        })
    })
</script>


<div class="gmu-media-detect" id="gmu-media-detect0"></div>
</body>
</html>