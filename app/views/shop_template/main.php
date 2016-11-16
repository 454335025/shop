<html style="font-size: 20.6px; display: block;">
<head>
    <meta charset="utf-8">
    <title>聚美触屏版</title>
    <meta name="description" content="聚美优品是国内知名正品女性团购网站,也是领先的品牌化妆品团购和护肤品团购网,聚美优品团购化妆品每天有超值的化妆品和护肤品团购信息.">
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="full-screen" content="yes">
    <meta http-equiv="cache-control" content="max-age=0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <link rel="shortcut icon" href="favicon.ico">

    <link href="<?php echo STATIC_COMMON;?>/css/shop/common/ui.css" rel="stylesheet" type="text/css">
    <link href="<?php echo STATIC_COMMON;?>/css/shop/main/jmtouch.css" rel="stylesheet" type="text/css">
    <link href="<?php echo STATIC_COMMON;?>/css/shop/common/guide_download.css" rel="stylesheet" type="text/css">
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

<!--shop car-->
<a class="float_car" href="/shop/shop_car">
    <img src="<?php echo STATIC_COMMON;?>/images/shop/main/float_car.png" data-original="<?php echo STATIC_COMMON;?>/images/shop/main/float_car.png" alt="">
    <div class="shoping_car_num">
        <?php echo $shop_cart_count ?>
    </div>
</a>
<!--shop car-->

<!--to top-->
<a href="#page_top" class="go_top" style="display: inline; transform-origin: 0px 0px 0px; opacity: 1;">
    <img src="<?php echo STATIC_COMMON;?>/images/shop/main/icon_top.png" alt="">
</a>
<!--to top-->

<div id="search_defer" class="" style="transform-origin: 0px 0px 0px; opacity: 1;">

    <!--search-->
    <header>
        <a href="/shop/user">
            <img class="my" src="<?php echo STATIC_COMMON;?>/images/shop/main/login2.png">
        </a>
        <a id="page_top" class="index-search">
            <img src="<?php echo STATIC_COMMON;?>/images/shop/main/search2.png"><span>搜索商品 分类 功效</span>
        </a>
        <span id="search_action">
            <img class="search" src="<?php echo STATIC_COMMON;?>/images/shop/main/search_list2.png">
        </span>
    </header>
    <!--search-->

    <!--menu-->
    <div style="height:40px;" id="hearder_nav">
        <div id="nav-outer" style="background: #fff;">
            <div class="headerNav clearfix" id="nav-inner">
                <p style="width:auto;padding:0px 15px" class="navTitle nt_deal nav_select">
                    <a href='/'>
                        <span>今日团购</span>
                        <span class="header-nav-line"></span>
                    </a>
                </p>
                <p style="width:auto;padding:0px 15px" class="navTitle nt_deal ">
                    <a href='#'>
                        <span>1111</span>
                        <span class="header-nav-line"></span>
                    </a>
                </p>
                <?php foreach ($directories as $directory) { ?>
                    <div style="width:auto;padding:0px 15px" class="navTitle nt_mall ">
                        <a href='javascript:void(0)' onclick="toggle(this)">
                            <span><?php echo $directory->name ?></span>
                        </a>
                        <ul id="mall_sel" class="mall_sel" style="display:none;">
                            <?php foreach ($directory->hasManySubDirectories as $hasManySubDirectories) { ?>
                                <a href="http://h5.jumei.com/mall/index?type=category">
                                    <li><?php echo $hasManySubDirectories->name ?></li>
                                </a>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                <!--                <div style="width:auto;padding:0px 15px" class="navTitle nt_mall ">-->
                <!--                    <a href='javascript:void(0)' onclick = "toggle(this)">-->
                <!--                    <span>美妆商城</span>-->
                <!--                    </a>-->
                <!--                    <ul id = "mall_sel" class = "mall_sel" style="display:none;">-->
                <!--                        <a href = "http://h5.jumei.com/mall/index?type=category"><li>按分类浏览</li></a>-->
                <!--                        <a href = "http://h5.jumei.com/mall/index?type=brand"><li>按品牌浏览</li></a>-->
                <!--                        <a href = "http://h5.jumei.com/mall/index?type=function"><li>按功效浏览</li></a>-->
                <!--                    </ul>-->
                <!--                </div>-->
            </div>
        </div>
    </div>
    <!--menu-->

    <!--banner-->
    <div class="container swipe" id="slider" style="z-index:-1">
        <div id="banners" class="swipe-wrap">
            <a href="###">
                <img src="<?php echo STATIC_COMMON;?>/images/shop/banner/1.jpg"/>
            </a>
        </div>
        <ul id="position">

        </ul>
    </div>
    <!--banner-->

    <input type="hidden" name="call_deal_card_id" id="call_deal_card_id" value="145">
    <input type="hidden" name="locate_key" id="locate_key" value="jmdl14">

    <!--list container start-->
    <div class="list_container" style="display: block; transform-origin: 0px 0px 0px; opacity: 1;">
        <?php foreach ($wares as $ware) { ?>
        <a href="/shop/ware_detail?ware_id=<?php echo $ware->id ?>">
            <div class="item-product clearfix">
                <div class="item_image">
                    <img src="<?php echo $ware->main_img ?>" class="lazy product-img">
                    <img class="product-icon lazy" src="http://p0.jmstatic.com/banner/area/000/000/029.jpg">
                </div>
                <div class="information">
                    <p><?php echo $ware->remark ?></p>
                </div>
                <div class="price_info">
                    <div class="clearfix">
                        <div class="now_price pull_left">
                            ￥<em><?php echo $ware->money ?></em>
                            <span class="grey del">
                                <span>￥<?php echo $ware->original_money ?></span>
                            </span>
                        </div>
                    </div>
                    <div class="clearfix buy_num">
                        <div class="grey">1045人已购买</div>
                    </div>
                </div>
            </div>
        </a>
        <?php } ?>
    </div>
    <div class="loading">加载中...</div>
</div>

<div id="page_outer" class="">
</div>
<div id="search_page" class="hide" style="transform-origin: 0px 0px 0px; opacity: 1;">
    <div class="search_head">
        <a id="history_back" class="pull_left">
            <img src="<?php echo STATIC_COMMON;?>/images/shop/main/NavButtonBack.png" alt="">
        </a>
        <div class="input_outer">
            <img src="<?php echo STATIC_COMMON;?>/images/shop/main/search2.png" alt="" class="search_icon">
            <input type="text" class="search_input" placeholder="搜索商品名称、品牌、功效" id="search_input">
        </div>
        <a class="search_btn" id="search_back" style="transform-origin: 0px 0px 0px; opacity: 1;">返回</a>
        <a class="search_btn" id="search_cancel" style="display: none;">搜索</a>
    </div>
    <ul class="search_links" style="height: 686px; transform-origin: 0px 0px 0px; opacity: 1;">
        <?php foreach ($directories as $directory) { ?>
        <li class="search_link"><?php echo $directory->name ?><span class="arrow"></span>
            <ul class="search_subs">
                <?php foreach ($directory->hasManySubDirectories as $hasManySubDirectory) { ?>
                <li class="search_sub"><a href="/search/index?category_id=62"><?php echo $hasManySubDirectory->name ?></a></li>
                <?php } ?>
            </ul>
        </li>
        <?php } ?>
        <li class="search_link">其他<span class="arrow"></span>
            <ul class="search_subs">
                <li class="search_sub"><a href="/search/index?category_id=481">喜从盒来</a></li>
                <li class="search_sub"><a href="/search/index?category_id=483">会员生日礼包</a></li>
            </ul>
        </li>
    </ul>
    <ul class="history_lists" style="display: none;">
        <div id="clear_history">清空历史记录</div>
    </ul>
    <ul class="recommend_lists" style="display: none;">
        <!-- <li class="recommend_list">
            <a href="">
                <img src="{$cssDir}/v3/image/search_btn.png" alt="" class="icon">
                海飞丝
            </a>
            <span class="arrow"></span>
        </li> -->
    </ul>
</div>
<input type="hidden" value="" id="h5_host_url">
<script type="text/javascript" src="<?php echo STATIC_COMMON;?>/js/shop/common/jumei.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo STATIC_COMMON;?>/css/shop/main/search_list.css" charset="utf-8">
<script type="text/javascript" src="<?php echo STATIC_COMMON;?>/js/shop/main/search_list.js"></script>

<script type="text/javascript" src="<?php echo STATIC_COMMON;?>/js/shop/main/swipe.js"></script>
<script type="text/javascript" src="<?php echo STATIC_COMMON;?>/js/shop/common/index_main.js"></script>
<script type="text/javascript" src="<?php echo STATIC_COMMON;?>/js/shop/common/guide_download_main.js"></script>

<div class="gmu-media-detect" id="gmu-media-detect0"></div>
</body>
</html>