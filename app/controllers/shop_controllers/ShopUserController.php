<?php


class ShopUserController extends BaseController
{

    public function index()
    {
        self::$view = View::make('shop_template.user')
            ->with('user', parent::$user)
            ->withTitle('我的信息');
    }

    public static function toMyOrderUI()
    {
        self::$view = View::make('shop_template.my_order')
            ->withTitle('我的订单');
    }
}