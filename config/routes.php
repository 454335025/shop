<?php

use NoahBuscher\Macaw\Macaw;


/**
 * /shop(项目类)/user(模块类)/方法
 * 方法
 * 1：跳转页面 /xx/xx/to_TemplateName
 * /shop/user/to_user
 * /shop/user/
 */
//Macaw::get('/', 'HomeController@home');

//shop BEGIN

//shop/main BEGIN
//商城主页
Macaw::get('/shop',                                         'ShopMainController@index');
//商城主页
Macaw::get('/shop/main',                                    'ShopMainController@index');
//shop/main END

//shop/shop_car BEGIN
//商城购物车
Macaw::get('/shop/shop_car',                                'ShopShopCarController@index');
//添加商品到购物车
Macaw::post('/shop/shop_car/add_ware',                      'ShopShopCarController@addWare');
//修改购物车商品数量
Macaw::get('/shop/shop_car/update_number',                  'ShopShopCarController@updateWareNumberById');
//删除购物车商品
Macaw::get('/shop/shop_car/delete_ware',                    'ShopShopCarController@deleteWareById');
//shop/shop_car END

//shop/ware BEGIN
//商品详情页
Macaw::get('/shop/ware',                                    'ShopWareController@index');
//shop/ware END

//shop/user BEGIN
//用户页面
Macaw::get('/shop/user',                                    'ShopUserController@index');
//我的订单页面
Macaw::get('/shop/user/to_order',                           'ShopUserController@toOrderUI');
//我的地址页面
Macaw::get('/shop/user/to_address',                         'ShopUserController@toAddressUI');
//添加地址页面
Macaw::get('/shop/user/to_address_add',                     'ShopUserController@toAddressAddUI');
//添加地址
Macaw::post('/shop/user/add_address',                       'ShopUserController@addAddress');
//update address isdefault
Macaw::post('/shop/user/update_address',                    'ShopUserController@updateAddress');
//删除地址
Macaw::post('/shop/user/delete_address',                    'ShopUserController@deleteAddress');
//shop/user EDN

//shop/order BEGIN
//跳转订单页面
Macaw::get('/shop/order',                                   'ShopOrderController@index');
//跳转订单地址更换页面
Macaw::get('/shop/order/to_address_update',                 'ShopOrderController@toAddressUpdateUI');
//shop/order EDN

//shop END




//managers BEGIN

//managers/index BEGIN
//主页
Macaw::get('/managers',                                     'ManagerIndexController@index');
Macaw::get('/managers/index',                               'ManagerIndexController@index');
//managers/index END

//managers/login BEGIN
//登录验证
Macaw::post('/managers/login',                              'ManagerLoginController@index');
//退出登录
Macaw::post('/managers/login/loginout',                     'ManagerLoginController@loginout');
//managers/login END

//manager END




//wx BEGIN
Macaw::get('/wx',                                           'WxIndexController@index');
Macaw::get('/wx/index',                                     'WxIndexController@index');
//wx END
//test BEGIN
Macaw::get('/test', 'TestController@index');
//test END
Macaw::$error_callback = function () {
    throw new Exception("路由无匹配项 404 Not Found");
};

Macaw::dispatch();