<html style="font-size: 20.6px; display: block;">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" id="viewport" content="width=320,user-scalable=no,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="这是网页描述">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="full-screen" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="address=no">
    <title><?php echo $title ?></title>
    <link href="/css/shop/common/common.css" rel="stylesheet" type="text/css">
    <link href="/css/shop/common/guide_download.css" rel="stylesheet" type="text/css">

    <link href="/css/shop/ware/detail.css" rel="stylesheet" type="text/css">
    <link href="/css/shop/ware/countdown.css" rel="stylesheet" type="text/css">
    <link href="/css/shop/ware/index.css" rel="stylesheet" type="text/css">

</head>
<body style="width: 20rem;">
<?php require SHOP_COMMON; ?>
<div id="search_defer">
    <div class="details new_details">
        <!--商品信息介绍 start-->
        <div class="detailsInfo new_detailsInfo">
            <div class="detail_group">
                <p class="productPic ">
                    <img src="http://p0.jmstatic.com/banner/area/000/000/029.jpg" alt="" class="img_tag">
                    <img src="http://mp1.jmstatic.com/c_zoom,w_480,q_70/product/001/420/1420087_std/1420087_1000_1000.jpg?v=1430216578" class="" height="160">
                </p>
                <div class="detail_info_item clear">
                    <div class="detail_price_info pull_left">
                        <div class="now_price">
                            <span class="font_size12">团购价</span>
                            <span><span class="font_size12">￥</span><span id="newPrice"><?php echo $wares->money; ?></span></span>
                        </div>
                    </div>
                    <div class="sale_info pull_right">
                        <p><label class="discount">今日团购 </label></p>
                        <p><label class="bought">590人已购买</label></p>
                    </div>
                </div>
                <!--减 start-->
                <div id="sale_div">
                </div>
                <div class="float_cover_bg show_sale_rules">
                    <div class="alert_box" id="alert_box">
                    </div>
                </div>
                <!--减 end-->

                <div class="detail_info_item deal_dscribe"><?php echo $wares->remark; ?>
                </div>
            </div>
            <div class="bottom_fixed">
                <a href="http://h5.jumei.com/cart/list" class="detail_car">
                    <div class="detail_car_num">1</div>
                </a>
                <input type="button" id="add_shopping" class="add_cart" value="加入购物车">
            </div>
        </div>
        <!--商品信息介绍 end-->
        <!--商品详细参数 start-->
        <div class="detail_group border_top">
            <div class="h5">商品详细参数</div>
            <ul class="details_arg">
                <li>
                    <span class="title">商品名称:</span>
                    <span class="content"><?php echo $wares->name; ?></span>
                    <?php foreach ($parameters as $key => $val){ ?>
                        <span class="title"><?php echo $key; ?></span>
                        <span class="content"><?php echo $val; ?></span>
                    <?php } ?>
                </li>
            </ul>
        </div>
        <!--商品详细参数 end-->
        <!-- 商品详情和口碑信息 start -->
        <div class="detail_group detail_report">
            <div id="detail_nav">
                <div class="detail_nav_inner">
                    <ul class="clear padding10">
                        <li class="detail_tap pull_left select" id="imgs_tap">商品详情</li>
<!--                        <li class="detail_tap pull_left" id="pingjia_tap">口碑信息</li>-->
                    </ul>
                </div>
            </div>
            <div class="tap_content">
                <section id="detail_imgs" class="tap_page current_tap">
                    <div class="padding10 word_break">
                        <div id="detail_imgs_inner" class="zoom_jianrong">
                            <div id="info" class="detail_info">
                                <?php foreach ($wares->hasManyWareImages as $hasManyWareImage){?>
                                    <img src="<?php echo $hasManyWareImage->image; ?>" alt="">
                                <?php }?>
                            </div>
                        </div>
                </section>
                <section id="detail_pingjia" class="tap_page word_break">
                    <div id="detail_pingjia_inner" class="padding10 word_break"></div>
                    <p id="more_pingjia" class="more_pingjia">点击加载更多</p>
                    <div class="loadding-content ajax-loading-bottom" id="ajax-loading">
                        <div class="spinner">
                            <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- 商品详情和口碑信息 end -->

        <!-- 大家还买了 start -->
<!--        <div class="detail_buy">-->
<!--            <div class="detail_group border_top">-->
<!--                <div class="h5">大家还买了</div>-->
<!--                <div id="details_recommend" class="details_recommend swipe" style="visibility: visible;">-->
<!--                    <ul class="swipe-wrap" style="width: 1648px;">-->
<!--                        <li data-index="0" style="width: 412px; left: 0px; transition-duration: 0ms; transform: translate(0px, 0px) translateZ(0px);">-->
<!--                            <ul style="margin: 0px 10px;">-->
<!--                                <a href="/product/detail?item_id=ht161106p1750687t1&amp;type=global_deal" class="details_recommend_a">-->
<!--                                    <li>-->
<!--                                        <p class="img">-->
<!--                                            <img src="http://p2.jmstatic.com/product/001/750/1750687_std/1750687_160_160.jpg" onerror="this.src=" http:="" s1.jmstatic.com="" templates="" touch=""-->
<!--                                                css="" v3="" image="" bg_logo_1_1.jpg""="">-->
<!--                                        </p>-->
<!--                                        <p class="title">SPC蜗牛液精华面膜贴增量装50枚</p>-->
<!--                                        <p class="price">￥99</p></li>-->
<!--                                </a>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <!-- 大家还买了 end -->
        <br/>
        <br/>
        <br/>
        <br/>
    </div>
</div>
<div class="ui-bg"></div>

<script type="text/javascript" src="/js/shop/common/jumei.js"></script>
<script type="text/javascript" src="/js/shop/common/guide_download_main.js"></script>
<script type="text/javascript" src="/js/shop/common/ui.js"></script>
<!--<script type="text/javascript" src="//a5.jmstatic.com/a3dc29676cc4dd43/detail_main.js"></script>-->
<div id="toTop" style="background: url(http://ms0.jmstatic.com/beauty/image/back_top@2x.png) left center no-repeat !important;background-size: 44px 44px !important;position: fixed;bottom: 80px;width: 45px;height: 45px;z-index: 200000;right: 10px;display: none;"></div>
<span id="toast-boxs" class="toast-boxs" style="transition: -webkit-transform 1s ease 0s , opacity 1s ease 0s;-webkit-transition: -webkit-transform 1s ease 0s , opacity 1s ease 0s;opacity:0;visibility: hidden;position:fixed;"></span>
<script type="text/javascript" src="/js/shop/ware_detail/detail_list_main.js"></script>

<script type="text/javascript" src="/js/shop/ware_detail/sensorsdata.min.js"></script>

<div class="gmu-media-detect" id="gmu-media-detect0"></div>
</body>
</html>