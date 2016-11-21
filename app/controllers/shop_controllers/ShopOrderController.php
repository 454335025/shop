<?php


class ShopOrderController extends BaseController
{


    public static function index()
    {
        self::$view = View::make('shop_template.order')
            ->withTitle('我的订单');
    }

    public static function toOrderUI()
    {

        self::$view = View::make('shop_template.order')
            ->with('user',parent::$user)
            ->withTitle('我的订单');
    }

    public static function toOrderMyUI()
    {
        self::$view = View::make('shop_template.order_my')
            ->withTitle('我的订单');
    }
}