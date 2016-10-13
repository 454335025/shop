<?php

use NoahBuscher\Macaw\Macaw;

Macaw::get('/', 'HomeController@home');

Macaw::get('/shop',                 'Shop_MainController@index');
Macaw::get('/shop/main',            'Shop_MainController@index');
Macaw::get('/shop/shop_car',        'Shop_ShopCarController@index');
Macaw::get('/shop/user',            'Shop_UserController@index');
Macaw::get('/shop/statement',       'Shop_StatementController@index');

Macaw::$error_callback = function () {

    throw new Exception("路由无匹配项 404 Not Found");

};

Macaw::dispatch();