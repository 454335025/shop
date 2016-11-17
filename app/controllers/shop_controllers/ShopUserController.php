<?php


class ShopUserController extends BaseController
{

    public function index()
    {
        self::$view = View::make('shop_template.user')
            ->with('user', parent::$user)
            ->withTitle('我的信息');
    }

    public static function toUserOrderUI()
    {
        self::$view = View::make('shop_template.user_order')
            ->withTitle('我的订单');
    }

    public static function toUserAddressUI()
    {
        self::$view = View::make('shop_template.user_address')
            ->withTitle('我的address');
    }

    public static function toUserAddressAddUI()
    {
        self::$view = View::make('shop_template.user_address_add')
            ->withTitle('add我的address');
    }
}