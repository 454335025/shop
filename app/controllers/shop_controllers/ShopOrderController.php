<?php


class ShopOrderController extends BaseController
{

    public static function toOrderAddUI()
    {
        self::$view = View::make('shop_template.order_add')
            ->withTitle('我的订单');
    }

    public static function toOrderMyUI()
    {
        self::$view = View::make('shop_template.order_my')
            ->withTitle('我的订单');
    }
}