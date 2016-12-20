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
//修改地址
Macaw::post('/shop/user/update_address',                    'ShopUserController@updateAddress');
//删除地址
Macaw::post('/shop/user/delete_address',                    'ShopUserController@deleteAddress');

//shop/user EDN

//shop/order BEGIN
//跳转订单页面
Macaw::get('/shop/order',                                   'ShopOrderController@index');
//跳转订单地址更换页面
Macaw::get('/shop/order/to_address_update',                 'ShopOrderController@toAddressUpdateUI');
//使用积分
Macaw::get('/shop/order/use_Integral',                      'ShopOrderController@getIntegralByIsUse');
Macaw::post('/shop/order/use_Integral',                     'ShopOrderController@getMoneyByIsUse');
//添加订单
Macaw::post('/shop/order/add_orders',                       'ShopOrderController@addOrders');
//确认收货
Macaw::post('/shop/order/update_order_type',                'ShopOrderController@updateOrderType');
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

//managers/user BEGIN
//管理平台用户列表
Macaw::get('/managers/user',                                'ManagerUserController@index');
//managers/user END

//managers/menu BEGIN
//管理平台父菜单列表
Macaw::get('/managers/menu/to_menu',                        'ManagerMenuController@toMenuUI');
//跳转管理平台添加父菜单页面
Macaw::get('/managers/menu/to_menu_add',                    'ManagerMenuController@toMenuAddUI');
//跳转管理平台修改父菜单页面
Macaw::get('/managers/menu/to_menu_update',                 'ManagerMenuController@toMenuUpdateUI');
//管理平台添加父菜单
Macaw::get('/managers/menu/add_menu',                       'ManagerMenuController@addMenu');
//管理平台修改父菜单
Macaw::post('/managers/menu/update_menu',                   'ManagerMenuController@updateMenu');
//管理平台删除父菜单
Macaw::post('/managers/menu/delete_menu',                   'ManagerMenuController@deleteMenu');
//managers/menu END

//managers/sub_menu BEGIN
//管理平台子菜单列表
Macaw::get('/managers/sub_menu/to_sub_menu',                'ManagerSubMenuController@toSubMenuUI');
//跳转管理平台添加子菜单页面
Macaw::get('/managers/sub_menu/to_sub_menu_add',            'ManagerSubMenuController@toSubMenuAddUI');
//跳转管理平台修改子菜单页面
Macaw::get('/managers/sub_menu/to_sub_menu_update',         'ManagerSubMenuController@toSubMenuUpdateUI');
//管理平台添加子菜单
Macaw::get('/managers/sub_menu/add_sub_menu',               'ManagerSubMenuController@addSubMenu');
//管理平台修改子菜单
Macaw::post('/managers/sub_menu/update_sub_menu',           'ManagerSubMenuController@updateSubMenu');
//管理平台删除子菜单
Macaw::post('/managers/sub_menu/delete_sub_menu',           'ManagerSubMenuController@deleteSubMenu');
//managers/sub_menu END

//managers/user BEGIN
//管理平台用户列表
Macaw::get('/managers/user/to_user',                        'ManagerUserController@toUserUI');
//跳转管理平台添加用户页面
Macaw::get('/managers/user/to_user_add',                    'ManagerUserController@toUserAddUI');
//跳转管理平台修改用户页面
Macaw::get('/managers/user/to_user_update',                 'ManagerUserController@toUserUpdateUI');
//管理平台添加用户
Macaw::get('/managers/user/add_user',                       'ManagerUserController@addUser');
//管理平台修改用户
Macaw::post('/managers/user/update_user',                   'ManagerUserController@updateUser');
//管理平台删除用户
Macaw::post('/managers/user/delete_user',                   'ManagerUserController@deleteUser');
//managers/user END


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