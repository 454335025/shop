<?php

use NoahBuscher\Macaw\Macaw;

Macaw::get('/', 'HomeController@home');

//shop BEGIN

//商城主页
Macaw::get('/shop',                                     'ShopMainController@index');
//商城主页
Macaw::get('/shop/main',                                'ShopMainController@index');
//商城购物车
Macaw::get('/shop/shop_car',                            'ShopShopCarController@index');
//添加商品到购物车
Macaw::get('/shop/shop_car/add_shopping',              'ShopShopCarController@addWare');
//修改购物车商品数量
Macaw::get('/shop/shop_car/update_number',              'ShopShopCarController@updateWareNumberById');
//删除购物车商品
Macaw::get('/shop/shop_car/delete_ware',                'ShopShopCarController@deleteWareById');
//用户页面
Macaw::get('/shop/user',                                'ShopUserController@index');
//我的订单
Macaw::get('/shop/user/my_order',                       'ShopUserController@toMyOrderUI');
//商品详情页
Macaw::get('/shop/ware_detail',                         'ShopWareController@index');

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