<?php

use Illuminate\Database\Capsule\Manager as Capsule;


// 定义 BASE_PATH

define('BASE_PATH', __DIR__);

// 定义 STATIC_COMMON

define('STATIC_COMMON', '');

// 定义 SHOP_COMMON

define('SHOP_COMMON', __DIR__ . '/app/views/shop_template/common/header.php');


// Autoload 自动载入

require BASE_PATH . '/vendor/autoload.php';


require BASE_PATH . '/config/wxconfig.php';

// Eloquent ORM

$capsule = new Capsule;

$capsule->addConnection(require BASE_PATH . '/config/database.php');

$capsule->bootEloquent();

// whoops 错误提示

$whoops = new \Whoops\Run;

$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);

$whoops->register();