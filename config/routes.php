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
Macaw::post('/shop/shop_car/update_number',                 'ShopShopCarController@updateWareNumberById');
//删除购物车商品
Macaw::post('/shop/shop_car/delete_ware',                   'ShopShopCarController@deleteWareById');
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
//我的订单详情
Macaw::get('/shop/user/to_order_detail',                    'ShopUserController@toOrderDetailUI');
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
Macaw::post('/managers/menu/add_menu',                      'ManagerMenuController@addMenu');
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
Macaw::post('/managers/sub_menu/add_sub_menu',              'ManagerSubMenuController@addSubMenu');
//管理平台修改子菜单
Macaw::post('/managers/sub_menu/update_sub_menu',           'ManagerSubMenuController@updateSubMenu');
//管理平台删除子菜单
Macaw::post('/managers/sub_menu/delete_sub_menu',           'ManagerSubMenuController@deleteSubMenu');
//managers/sub_menu END

//managers/relation_menu BEGIN
//管理平台权限列表
Macaw::get('/managers/relation_menu/to_relation_menu',                'ManagerRelationMenuController@toRelationMenuUI');
//跳转管理平台添加权限页面
Macaw::get('/managers/relation_menu/to_relation_menu_add',            'ManagerRelationMenuController@toRelationMenuAddUI');
//跳转管理平台修改权限页面
Macaw::get('/managers/relation_menu/to_relation_menu_update',         'ManagerRelationMenuController@toRelationMenuUpdateUI');
//管理平台添加权限
Macaw::post('/managers/relation_menu/add_relation_menu',              'ManagerRelationMenuController@addRelationMenu');
//管理平台修改权限
Macaw::post('/managers/relation_menu/update_relation_menu',           'ManagerRelationMenuController@updateRelationMenu');
//管理平台删除权限
Macaw::post('/managers/relation_menu/delete_relation_menu',           'ManagerRelationMenuController@deleteRelationMenu');
//managers/relation_menu END

//managers/user BEGIN
//管理平台用户列表
Macaw::get('/managers/user/to_user',                        'ManagerUserController@toUserUI');
//跳转管理平台添加用户页面
Macaw::get('/managers/user/to_user_add',                    'ManagerUserController@toUserAddUI');
//跳转管理平台修改用户页面
Macaw::get('/managers/user/to_user_update',                 'ManagerUserController@toUserUpdateUI');
//管理平台添加用户
Macaw::post('/managers/user/add_user',                      'ManagerUserController@addUser');
//管理平台修改用户
Macaw::post('/managers/user/update_user',                   'ManagerUserController@updateUser');
//管理平台删除用户
Macaw::post('/managers/user/delete_user',                   'ManagerUserController@deleteUser');
//managers/user END

//managers/user_type BEGIN
//管理平台用户类型列表
Macaw::get('/managers/user_type/to_user_type',                'ManagerUserTypeController@toUserTypeUI');
//跳转管理平台添加用户类型页面
Macaw::get('/managers/user_type/to_user_type_add',            'ManagerUserTypeController@toUserTypeAddUI');
//跳转管理平台修改用户类型页面
Macaw::get('/managers/user_type/to_user_type_update',         'ManagerUserTypeController@toUserTypeUpdateUI');
//管理平台添加用户类型
Macaw::post('/managers/user_type/add_user_type',              'ManagerUserTypeController@addUserType');
//管理平台修改用户类型
Macaw::post('/managers/user_type/update_user_type',           'ManagerUserTypeController@updateUserType');
//管理平台删除用户类型
Macaw::post('/managers/user_type/delete_user_type',           'ManagerUserTypeController@deleteUserType');
//managers/user_type END

//managers/shop_directory BEGIN
//管理平台用户类型列表
Macaw::get('/managers/shop_directory/to_shop_directory',                'ManagerShopDirectoryController@toShopDirectoryUI');
//跳转管理平台添加用户类型页面
Macaw::get('/managers/shop_directory/to_shop_directory_add',            'ManagerShopDirectoryController@toShopDirectoryAddUI');
//跳转管理平台修改用户类型页面
Macaw::get('/managers/shop_directory/to_shop_directory_update',         'ManagerShopDirectoryController@toShopDirectoryUpdateUI');
//管理平台添加用户类型
Macaw::post('/managers/shop_directory/add_shop_directory',              'ManagerShopDirectoryController@addShopDirectory');
//管理平台修改用户类型
Macaw::post('/managers/shop_directory/update_shop_directory',           'ManagerShopDirectoryController@updateShopDirectory');
//管理平台删除用户类型
Macaw::post('/managers/shop_directory/delete_shop_directory',           'ManagerShopDirectoryController@deleteShopDirectory');
//managers/shop_directory END

//managers/shop_sub_directory BEGIN
//管理平台用户类型列表
Macaw::get('/managers/shop_sub_directory/to_shop_sub_directory',                'ManagerShopSubDirectoryController@toShopSubDirectoryUI');
//跳转管理平台添加用户类型页面
Macaw::get('/managers/shop_sub_directory/to_shop_sub_directory_add',            'ManagerShopSubDirectoryController@toShopSubDirectoryAddUI');
//跳转管理平台修改用户类型页面
Macaw::get('/managers/shop_sub_directory/to_shop_sub_directory_update',         'ManagerShopSubDirectoryController@toShopSubDirectoryUpdateUI');
//管理平台添加用户类型
Macaw::post('/managers/shop_sub_directory/add_shop_sub_directory',              'ManagerShopSubDirectoryController@addShopSubDirectory');
//管理平台修改用户类型
Macaw::post('/managers/shop_sub_directory/update_shop_sub_directory',           'ManagerShopSubDirectoryController@updateShopSubDirectory');
//管理平台删除用户类型
Macaw::post('/managers/shop_sub_directory/delete_shop_sub_directory',           'ManagerShopSubDirectoryController@deleteShopSubDirectory');
//managers/shop_sub_directory END


//managers/shop_ware BEGIN
//管理平台商品列表
Macaw::get('/managers/shop_ware/to_shop_ware',                'ManagerShopWareController@toShopWareUI');
//跳转管理平台添加商品页面
Macaw::get('/managers/shop_ware/to_shop_ware_add',            'ManagerShopWareController@toShopWareAddUI');
//跳转管理平台修改商品页面
Macaw::get('/managers/shop_ware/to_shop_ware_update',         'ManagerShopWareController@toShopWareUpdateUI');
//管理平台添加商品
Macaw::post('/managers/shop_ware/add_shop_ware',              'ManagerShopWareController@addShopWare');
//管理平台修改商品
Macaw::post('/managers/shop_ware/update_shop_ware',           'ManagerShopWareController@updateShopWare');
//管理平台删除商品
Macaw::post('/managers/shop_ware/delete_shop_ware',           'ManagerShopWareController@deleteShopWare');
//managers/shop_ware END

//manager END



//wx BEGIN
Macaw::get('/wx',                                           'WxIndexController@index');
Macaw::get('/wx/index',                                     'WxIndexController@index');
Macaw::post('/wx',                                          'WxIndexController@index');
Macaw::post('/wx/index',                                    'WxIndexController@index');
//wx END
//test BEGIN
Macaw::get('/test', 'TestController@index');
//test END
Macaw::$error_callback = function () {
    throw new Exception("路由无匹配项 404 Not Found");
};

Macaw::dispatch();