<?php


class ShopOrderController extends BaseController
{
    private static $ShopShopCar;

    public function __construct()
    {
        parent::__construct();
        self::$ShopShopCar = new ShopShopCarController();

    }

    public static function index()
    {
        $cost_count = self::$ShopShopCar->getCostCount(parent::$user->hasManyShopCarts);
        self::$view = View::make('shop_template.order')
            ->with('user',parent::$user)
            ->with('cost_count',$cost_count)
            ->withTitle('我的订单');
    }

    public static function toAddressUpdateUI()
    {
        self::$view = View::make('shop_template.order_address_update')
            ->withTitle('update_address');exit;
    }
}