<html style="font-size: 20.6px; display: block;">
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="description" content="泸州老窖">
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
<?php include_once BASE_PATH . "/app/views/shop_template/main/main_shop_car.php"; ?>
<!--shop car-->

<!--to top-->
<?php include_once BASE_PATH . "/app/views/shop_template/main/main_top.php"; ?>
<!--to top-->

<div id="search_defer" class="" style="transform-origin: 0px 0px 0px; opacity: 1;">

    <!--search-->
    <?php include_once BASE_PATH . "/app/views/shop_template/main/main_search.php"; ?>
    <!--search-->

    <!--menu-->
    <?php include_once BASE_PATH . "/app/views/shop_template/main/main_menu.php"; ?>
    <!--menu-->

    <!--banner-->
    <?php include_once BASE_PATH . "/app/views/shop_template/main/main_banner.php"; ?>
    <!--banner-->

    <!--ware_list start-->
    <?php include_once BASE_PATH . "/app/views/shop_template/main/main_ware_list.php"; ?>
    <!--ware_list end-->

</div>

<div id="page_outer" class=""></div>

<!--search_page start-->
<?php include_once BASE_PATH . "/app/views/shop_template/main/main_search_page.php"; ?>
<!--search_page end-->

<script type="text/javascript" src="<?php echo STATIC_COMMON; ?>/js/shop/common/jumei.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo STATIC_COMMON; ?>/css/shop/main/search_list.css"
      charset="utf-8">
<script type="text/javascript" src="<?php echo STATIC_COMMON; ?>/js/shop/main/search_list.js"></script>

<script type="text/javascript" src="<?php echo STATIC_COMMON; ?>/js/shop/main/swipe.js"></script>
<script type="text/javascript" src="<?php echo STATIC_COMMON; ?>/js/shop/common/index_main.js"></script>

<script type="text/javascript" src="<?php echo STATIC_COMMON; ?>/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_COMMON; ?>/js/shop/main/index.js"></script>

<div class="gmu-media-detect" id="gmu-media-detect0"></div>
</body>
</html>