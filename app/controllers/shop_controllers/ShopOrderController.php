<?php


class ShopOrderController extends BaseController
{

    public function __construct()
    {
        parent::__construct();

    }

    public static function index()
    {
        $cost_count = (new ShopShopCarController())->getCostCount(parent::$user->hasManyShopCarts);
        self::$view = View::make('shop_template.order')
            ->with('user',parent::$user)
            ->with('cost_count',$cost_count)
            ->withTitle('我的订单');
    }

    public static function toAddressUpdateUI()
    {

        self::$view = View::make('shop_template.order_address_update')
            ->with('user',parent::$user)
            ->withTitle('update_address');
    }
}