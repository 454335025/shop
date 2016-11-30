<?php

use app\models\S_OrderDetails;
use app\models\S_Orders;
use app\models\S_ShopCarts;
use Illuminate\Support\Facades\DB;
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
        return (new ShopShopCarController())->getActualCostCount($is_use);

    }

    /**
     * @return int
     */
    public static function getIntegralCount()
    {
        return (new ShopShopCarController())->getGetIntegralCount();
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
        $order_id = date('YmdHis', time()) . rand(100000, 999999);
        $order_detail = new S_OrderDetails();
        $order = new S_Orders();
        $is_use = $_REQUEST['is_use'];
        $i = 0;
        DB::transaction(function()
        {
            DB::table('users')->update(['votes' => 1]);

            DB::table('posts')->delete();
        });
        foreach (self::$shop_cars as $shop_car) {
            $order_detail->order_id = $order_id;
            $order_detail->ware_id = $shop_car->belongsToWare->id;
            $order_detail->money = $shop_car->belongsToWare->money;
            $order_detail->actual_money = $shop_car->belongsToWare->money * parent::$user->discount;
            $order_detail->number = $shop_car->number;
            $order_detail->is_discount = $shop_car->belongsToWare->is_discount;
            $order_detail->discount = parent::$user->discount;
            $order_detail->is_integral = $shop_car->belongsToWare->is_integral;
            $order_detail->cost_integral = $shop_car->belongsToWare->cost_integral;
            $order_detail->get_integral = $shop_car->belongsToWare->integral;
            $order_detail->save();
            $i++;
        }

        $order->order_id = $order_id;
        $order->user_id = parent::$user->id;
        $order->get_integral = self::getIntegralCount();
        $order->user_address_id = self::getIntegralCount();
        $order->money = (new ShopShopCarController())->getCostCount();
        $order->actual_money = self::getCostCount($is_use);
        $order->discount = parent::$user->discount;
        $order->discount_money = (new ShopShopCarController())->getCostCount() - self::getCostCount();
        $order->is_use_integral = $is_use ? 1 : 0;
        $order->cost_integral = ((int)self::isMyInegral() / parent::$user->hasOneUserType->min_integral)
            * parent::$user->hasOneUserType->min_integral;
        $order->integral_money = (int)((new ShopOrderController())->isMyInegral()
                / parent::$user->hasOneUserType->min_integral) * parent::$user->hasOneUserType->exchange;
        if ($i == 0 && $order->save()) {
            if(S_ShopCarts::where('user_id',parent::$user->id)->delete()){
                echo json_encode(array('data'=>1,'msg'=>'订单已经成功生成'));exit;
            }else{
                echo json_encode(array('data'=>2,'msg'=>'购物车商品删除失败'));exit;
            }
        }else{

        }


    }
}