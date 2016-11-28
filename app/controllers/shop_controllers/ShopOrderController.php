<?php


class ShopOrderController extends BaseController
{

    private static $shop_cars;

    public function __construct()
    {
        parent::__construct();
        self::$shop_cars = parent::$user->hasManyShopCarts;

    }

    public static function index()
    {

        $cost_count = self::getCostCount();
        $get_integral_count = self::getIntegralCount();
        $surplus_integral = self::isMyInegral();
        if ($surplus_integral) {
            self::$view = View::make('shop_template.order')
                ->with('user', parent::$user)
                ->with('cost_count', $cost_count)
                ->with('get_integral_count', $get_integral_count)
                ->with('surplus_integral', $surplus_integral)
                ->withTitle('我的订单');

        } else {
            echo "<script>
                alert('your shop car isintegral wares is many');
                window.location.href='/shop/shop_car';</script>";
            exit;
        }

    }

    /**
     *
     */

    public static function getCostCountByIsUseIntegral()
    {
        $is_use = $_REQUEST['is_use'];
        $is_use == 'true' ? $is_use = true : $is_use = false;
        echo self::getCostCount((boolean)$is_use);
        exit;
    }

    /**
     * @return int
     */

    public static function getCostCount($is_use = false)
    {
        return (new ShopShopCarController())->getCostCount(self::$shop_cars, $is_use);

    }

    /**
     * @return int
     */
    public static function getIntegralCount()
    {
        return (new ShopShopCarController())->getIntegralCount(self::$shop_cars);
    }

    /**
     *
     */

    public static function toAddressUpdateUI()
    {

        self::$view = View::make('shop_template.order_address_update')
            ->with('user', parent::$user)
            ->withTitle('update_address');
    }


    /**
     * @return bool
     */

    public static function isMyInegral()
    {
        $surplus_integral = parent::$user->integral;
        foreach (self::$shop_cars as $shop_car) {
            if ($shop_car->belongsToWare->is_integral == 1) {
                $surplus_integral = $surplus_integral - $shop_car->belongsToWare->cost_integral * $shop_car->number;
            }
        }
        if ($surplus_integral < 0) {
            return false;

        } else {
            return $surplus_integral;
        }
    }


    /**
     *
     */

    public static function addOrder()
    {
        $order_id = 'O_' . date('%Y%m%d%H%i%s', time()) . rand(000000,999999);

        $cost_count =
        $integral_count =

    }
}