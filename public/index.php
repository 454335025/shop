<?php

// 定义 PUBLIC_PATH

define('PUBLIC_PATH', __DIR__);

// 定义 SHOP_COMMON

define('SHOP_COMMON', __DIR__.'/../app/views/shop_template/common/header.php');

// 启动器

require PUBLIC_PATH.'/../bootstrap.php';

// 路由配置、开始处理

require BASE_PATH.'/config/routes.php';