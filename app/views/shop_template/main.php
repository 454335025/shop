<html style="font-size: 20.6px; display: block;">
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="description" content="聚美优品是国内">
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

    <link href="<?php echo STATIC_COMMON; ?>/css/shop/common/ui.css" rel="stylesheet" type="text/css">
    <link href="<?php echo STATIC_COMMON; ?>/css/shop/main/jmtouch.css" rel="stylesheet" type="text/css">
    <link href="<?php echo STATIC_COMMON; ?>/css/shop/common/guide_download.css" rel="stylesheet" type="text/css">

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
    <img src="<?php echo STATIC_COMMON; ?>/images/shop/main/float_car.png"
         data-original="<?php echo STATIC_COMMON; ?>/images/shop/main/float_car.png" alt="">
    <div class="shoping_car_num">
        <?php echo $shop_cart_count ?>
    </div>
</a>
<!--shop car-->

<!--to top-->
<a href="#page_top" class="go_top" style="display: inline; transform-origin: 0px 0px 0px; opacity: 1;">
    <img src="<?php echo STATIC_COMMON; ?>/images/shop/main/icon_top.png" alt="">
</a>
<!--to top-->

<div id="search_defer" class="" style="transform-origin: 0px 0px 0px; opacity: 1;">

    <!--search-->
    <header>
        <a href="/shop/user">
            <img class="my" src="<?php echo STATIC_COMMON; ?>/images/shop/main/login2.png">
        </a>
        <a id="page_top" class="index-search">
            <img src="<?php echo STATIC_COMMON; ?>/images/shop/main/search2.png"><span>搜索商品</span>
        </a>
        <span id="search_action">
            <img class="search" src="<?php echo STATIC_COMMON; ?>/images/shop/main/search_list2.png">
        </span>
    </header>
    <!--search-->

    <!--menu-->
    <div style="height:40px;" id="hearder_nav">
        <div id="nav-outer" style="background: #fff;">
            <div class="headerNav clearfix" id="nav-inner">
                <?php foreach ($directories as $directory) { ?>
                    <div style="width:auto;padding:0px 15px" class="navTitle nt_mall ">
                        <a href='javascript:void(0)' onclick="toggle(this)">
                            <span><?php echo $directory->name ?></span>
                        </a>
                        <ul id="mall_sel" class="mall_sel" style="display:none;">
                            <?php foreach ($directory->hasManySubDirectories as $hasManySubDirectory) { ?>
                                <a href="/shop/main?sub_directory_id=<?php echo $hasManySubDirectory->id ?>">
                                    <li><?php echo $hasManySubDirectory->name ?></li>
                                </a>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!--menu-->

    <!--banner-->
    <div class="container swipe" id="slider" style="z-index:-1">
        <div id="banners" class="swipe-wrap">
            <a href="###">
                <img src="<?php echo STATIC_COMMON; ?>/images/shop/banner/1.jpg"/>
            </a>
            <a href="###">
                <img src="<?php echo STATIC_COMMON; ?>/images/shop/banner/2.jpg"/>
            </a>
        </div>
        <ul id="position">

        </ul>
    </div>
    <!--banner-->
    <!--list container start-->
    <div class="list_container" style="display: block; transform-origin: 0px 0px 0px; opacity: 1;">
        <?php foreach ($wares as $ware) { ?>
            <a href="/shop/ware?ware_id=<?php echo $ware->id ?>">
                <div class="item-product clearfix">
                    <div class="item_image">
                        <img src="<?php echo $ware->main_img ?>" class="lazy product-img">
                    </div>
                    <div class="information">
                        <p><?php echo $ware->name ?></p>
                        <p> <?php echo $ware->remark ?></p>

                    </div>
                    <div class="price_info">
                        <div class="clearfix">
                            <div class="now_price pull_left">
                                <?php if ($ware->is_integral == 1) { ?>
                                    <em><?php echo $ware->cost_integral ?></em>积分
                                <?php } else { ?>
                                    ￥<em><?php echo $ware->money ?></em>
                                <?php } ?>
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
</div>

<div id="page_outer" class="">
</div>
<div id="search_page" class="hide" style="transform-origin: 0px 0px 0px; opacity: 1;">
    <div class="search_head">
        <a id="history_back" class="pull_left">
            <img src="<?php echo STATIC_COMMON; ?>/images/shop/main/NavButtonBack.png" alt="">
        </a>
        <div class="input_outer">
            <img src="<?php echo STATIC_COMMON; ?>/images/shop/main/search2.png" alt="" class="search_icon">
            <input type="text" class="search_input" placeholder="搜索商品名称" id="search_input">
        </div>
        <a class="search_btn" id="search_back" style="transform-origin: 0px 0px 0px; opacity: 1;">返回</a>
        <a class="search_btn" id="search_cancel" style="display: none;">搜索</a>
    </div>
    <ul class="search_links" style="height: 686px; transform-origin: 0px 0px 0px; opacity: 1;">
        <?php foreach ($directories as $directory) { ?>
            <li class="search_link"><?php echo $directory->name ?>
                <span class="arrow"></span>
                <ul class="search_subs">
                    <?php foreach ($directory->hasManySubDirectories as $hasManySubDirectory) { ?>
                        <li class="search_sub"><a
                                href="/shop/main?sub_directory_id=<?php echo $hasManySubDirectory->id ?>"><?php echo $hasManySubDirectory->name ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
    </ul>
</div>
<script type="text/javascript" src="<?php echo STATIC_COMMON; ?>/js/shop/common/jumei.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo STATIC_COMMON; ?>/css/shop/main/search_list.css"
      charset="utf-8">
<script type="text/javascript" src="<?php echo STATIC_COMMON; ?>/js/shop/main/search_list.js"></script>

<script type="text/javascript" src="<?php echo STATIC_COMMON; ?>/js/shop/main/swipe.js"></script>
<script type="text/javascript" src="<?php echo STATIC_COMMON; ?>/js/shop/common/index_main.js"></script>
<!--<script type="text/javascript" src="-->
<?php //echo STATIC_COMMON;?><!--/js/shop/common/guide_download_main.js"></script>-->

<script type="text/javascript" src="<?php echo STATIC_COMMON; ?>/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_COMMON; ?>/js/shop/main/index.js"></script>

<div class="gmu-media-detect" id="gmu-media-detect0"></div>
</body>
</html>