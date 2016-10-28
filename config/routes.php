<?php

use NoahBuscher\Macaw\Macaw;

Macaw::get('/', 'HomeController@home');


//shop BEGIN

Macaw::get('/shop',                                     'ShopMainController@index');

Macaw::get('/shop/main',                                'ShopMainController@index');

Macaw::get('/shop/shop_car',                            'ShopShopCarController@index');

Macaw::get('/shop/shop_car/update_number',              'ShopShopCarController@updateWareNumberById');

Macaw::get('/shop/shop_car/delete_ware',                'ShopShopCarController@deleteWareById');

Macaw::get('/shop/user',                                'ShopUserController@index');

Macaw::get('/shop/statement',                           'ShopStatementController@index');

//shop END

//shop BEGIN

Macaw::get('/manager',                                  'ManagerLoginController@index');

Macaw::get('/manager/login',                            'ManagerLoginController@index');

//shop END

//wx BEGIN

Macaw::get('/wx',                                       'WxIndexController@index');

Macaw::get('/wx/index',                                 'WxIndexController@index');

//wx END

//test BEGIN

Macaw::get('/test', 'TestController@index');

//test END


Macaw::$error_callback = function () {

    throw new Exception("路由无匹配项 404 Not Found");

};

Macaw::dispatch();