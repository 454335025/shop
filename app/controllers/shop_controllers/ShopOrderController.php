<?php


class ShopOrderController extends BaseController
{

    public function __construct()
    {
        parent::__construct();

    }

    public static function index()
    {
        $shop_cars = parent::$user->hasManyShopCarts;
        $cost_count = (new ShopShopCarController())->getCostCount($shop_cars);
        $get_integral_count = (new ShopShopCarController())->getIntegralCount($shop_cars);
        $surplus_integral = parent::$user->integral;
        foreach ($shop_cars as $shop_car) {
            if ($shop_car->belongsToWare->is_integral == 1) {
                $surplus_integral = $surplus_integral - $shop_car->belongsToWare->cost_integral * $shop_car->number;
            }
        }
        if ($surplus_integral < 0) {
            echo "<script>
                alert('your shop car isintegral wares is many');
                window.location.href='/shop/shop_car';</script>";
            exit;
        }
        self::$view = View::make('shop_template.order')
            ->with('user', parent::$user)
            ->with('cost_count', $cost_count)
            ->with('get_integral_count', $get_integral_count)
            ->with('surplus_integral', $surplus_integral)
            ->withTitle('我的订单');
    }

    public static function toAddressUpdateUI()
    {

        self::$view = View::make('shop_template.order_address_update')
            ->with('user', parent::$user)
            ->withTitle('update_address');
    }

    public static function addOrder()
    {
        $cost_count = (new ShopShopCarController())->getCostCount(parent::$user->hasManyShopCarts);
        $integral_count = (new ShopShopCarController())->getIntegralCount(parent::$user->hasManyShopCarts);

    }
}