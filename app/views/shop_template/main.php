<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>微信商城</title>
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name='apple-touch-fullscreen' content='yes'>
    <meta name="full-screen" content="yes">
    <meta http-equiv="cache-control" content="max-age=0"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <script src="/js/main/zepto.js"></script>
    <script src="/js/main/main.js"></script>
    <link type="text/css" rel="stylesheet" href="/css/main.css" media="screen" charset="utf-8"/>
    <script src="/js/main/jmtouch_h5.js"></script>
    <script src="/js/main/1.js"></script>
</head>

<body id="main-body">
<!--header start-->
<!--shop car-->
<a class="float_car" href="/shop/shop_car?openid=<?php echo $openid ?>">
    <img src="/images/main/float_car.png" data-original="/images/main/float_car.png" alt="">
    <div class="shoping_car_num">
        <?php echo $shop_cart_count ?>
    </div>
</a>
<!--shop car-->
<!--to top-->
<a href="#page_top" class="go_top" style="display: inline; transform-origin: 0px 0px 0px; opacity: 1;">
    <img src="http://f0.jmstatic.com/btstatic/h5/index/icon_top.png" alt="">
</a>
<!--to top-->
<div id="search_defer">
    <!--search-->
    <header>
        <a href="/shop/user?openid=<?php echo $openid ?>">
            <img class="my" src="/images/main/login2.png">
        </a>
        <a id="page_top" class="index-search">
            <img src="/images/main/search2.png"><span>搜索商品 分类 功效</span>
        </a>
        <span id="search_action">
            <img class="search" src="/images/main/search_list2.png">
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
                            <?php foreach ($directory->sub_directories as $sub_directory) { ?>
                                <a href="http://h5.jumei.com/mall/index?type=category">
                                    <li><?php echo $sub_directory->name ?></li>
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

    <script type="text/javascript" src="/js/main/2.js"></script>
    <script src="/js/main/swipe.js"></script>

    <!--banner-->
    <div class="container swipe" id="slider" style="z-index:-1">
        <div id="banners" class="swipe-wrap">
            <a href="###">
                <img src="/images/banner/1.jpg"/>
            </a>
            <a href="###">
                <img src="/images/banner/1.jpg"/>
            </a>
        </div>
        <ul id="position">

        </ul>
    </div>
    <!--banner-->
    <script type="text/javascript" src="/js/main/3.js"></script>

    <!--list container start-->
    <div class="list_container">
        <?php foreach ($wares as $ware) { ?>
            <a href="<?php echo $ware->id ?>">
                <div class="item clearfix">
                    <div class="item_image">
                        <img
                            src="http://mp1.jmstatic.com/c_zoom,w_352,q_70/product/002/809/2809102_std/2809102_1000_1000.jpg"
                            class="lazy product-img"/>
                    </div>
                    <div class="information">
                        <p>
                            <?php echo $ware->remark ?>
                        </p>
                        <div class="price_info">
                            <div class="clearfix" style="margin-top:7px;">
                                <div class="now_price pull_left">
                                    <em style="margin-left: -4px;">￥ <?php echo $ware->money ?></em>
                                    <span class="grey del">
                                    <span
                                        style="margin-left: -3px;text-decoration: line-through;">￥ <?php echo $ware->original_money ?></span>
                                </span>
                                </div>
                                <span class="grey pull_right" style="font-size:15px;"></span>
                            </div>
                            <div class="clearfix" style="margin-top:5px;"></div>
                        </div>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>
    <!--list container end-->

    <!---footer start-->
    <footer class="footer_container">
        <div id="top_line"></div>
    </footer>
    <!---footer end-->
</div>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link type="text/css" rel="stylesheet" href="/css/main.css" charset="utf-8"/>
<div id="page_outer">
</div>
<div id="search_page">
    <div class="search_head">
        <a id="history_back" class="pull_left">
            <img src="http://s1.jmstatic.com/templates/touch/css/i/NavButtonBack.png" alt="">
        </a>
        <div class="input_outer">
            <img src="http://s1.jmstatic.com/templates/touch/css/v3/image/search_btn.png" alt="" class="search_icon">
            <input type="text" class="search_input" placeholder="搜索商品名称、品牌、功效" id="search_input"/>
        </div>
        <a class="search_btn" id="search_back">返回</a>
        <a class="search_btn" id="search_cancel" style="display: none;">搜索</a>
    </div>
    <ul class="search_links">
        <li class="search_link">面部护肤<span class="arrow"></span>
            <ul class="search_subs">
                <li class="search_sub"><a href="http://h5.jumei.com/search/index?category_id=62">眼部护理</a></li>
                <li class="search_sub"><a href="http://h5.jumei.com/search/index?category_id=10">化妆水/爽肤水</a></li>
            </ul>
        </li>
        <li class="search_link">面部护肤<span class="arrow"></span>
            <ul class="search_subs">
                <li class="search_sub"><a href="http://h5.jumei.com/search/index?category_id=62">眼部护理</a></li>
                <li class="search_sub"><a href="http://h5.jumei.com/search/index?category_id=10">化妆水/爽肤水</a></li>

            </ul>
        </li>
    </ul>
    <ul class="history_lists">
        <div id="clear_history">清空历史记录</div>
    </ul>
    <ul class="recommend_lists">
    </ul>
</div>

<script type="text/javascript" src="/js/main/4.js"></script>
</body>
</html>
