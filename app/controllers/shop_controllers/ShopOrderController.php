<?php

use app\models\S_OrderDetails;
use app\models\S_Orders;
use app\models\S_ShopCarts;
use app\models\S_User;

class ShopOrderController extends BaseController
{

    public static function index()
    {

        $cost_count = self::getActualCostCount();
        if (self::getCostCount() <= 0) {
            echo "<script>
                alert('your shop car is null');
                window.location.href='/shop/main';</script>";
            exit;
        }
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
        echo json_encode(
            array(
                'money' => self::getActualCostCount() - self::getCostCountByIngeral($is_use),
                'integral' => parent::$user->integral - self::isMyInegral() + self::getCostIngeral()
            )
        );
        exit;
    }

    /**
     * @return int
     */

    public static function getCostCount()
    {
        return (new ShopShopCarController())->getCostCount();

    }

    /**
     * @return int
     */

    public static function getActualCostCount()
    {
        return (new ShopShopCarController())->getActualCostCount();

    }

    /**
     * @return int
     */

    public static function getCostCountByIngeral($is_use = false)
    {
        return (new ShopShopCarController())->getCostCountByIngeral($is_use);

    }

    /**
     * @return int
     */

    public static function getCostIngeral()
    {
        return (new ShopShopCarController())->getCostIngeral();

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
        foreach (parent::$user->hasManyShopCarts as $shop_car) {
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

    public static function addOrders()
    {
        $order_id = date('YmdHis', time()) . rand(100000, 999999);
        $is_use = $_REQUEST['is_use'];
        $is_use == 'true' ? $is_use = true : $is_use = false;
        $order_detail = self::addOrderDetail($order_id);
        if ($order_detail['i'] != 0) {
            S_OrderDetails::where('order_id', $order_id)->delete();
            echo json_encode(array('data' => 2, 'msg' => 'create order error'));
            exit;
        } else if ($order_detail['i'] == 0) {
            if (self::addOrder($order_id, $is_use, $order_detail)) {
//                S_ShopCarts::where('user_id', parent::$user->id)->delete();
                $user = S_User::find(parent::$user->id);
                $user->integral = $user->integral - $order_detail['cost_integral'] - self::getCostIngeral();
                $user->save();
                echo json_encode(array('data' => 1, 'msg' => '订单已经成功生成'));
                exit;
            } else {
                S_OrderDetails::where('order_id', $order_id)->delete();
                echo json_encode(array('data' => 2, 'msg' => 'create order error'));
                exit;
            }
        }
    }

    public static function addOrder($order_id, $is_use, $order_detail)
    {
        $order = new S_Orders();

        $order->order_id = $order_id;
        $order->user_id = parent::$user->id;
        $order->get_integral = self::getIntegralCount();
        $order->user_address_id = self::getIntegralCount();
        $order->money = self::getCostCount();
        $order->actual_money = self::getActualCostCount() - self::getCostCountByIngeral($is_use);
        $order->discount = parent::$user->hasOneUserType->discount;
        $order->discount_money = self::getCostCount() - self::getActualCostCount();
        $order->is_use_integral = $is_use ? 1 : 0;
        $order->cost_integral = $order_detail['cost_integral'] + $is_use ? self::getCostIngeral() : 0;
        $order->integral_money = self::getCostCountByIngeral($is_use);
        return $order->save();

    }

    public static function addOrderDetail($order_id)
    {
        $order_detail = new S_OrderDetails();
        $cost_integral = 0;
        $i = 0;
        foreach (parent::$user->hasManyShopCarts as $shop_car) {
            $order_detail->order_id = $order_id;
            $order_detail->ware_id = $shop_car->belongsToWare->id;
            $order_detail->money = $shop_car->belongsToWare->money;
            $order_detail->actual_money = $shop_car->belongsToWare->money * parent::$user->discount;
            $order_detail->number = $shop_car->number;
            $order_detail->is_discount = $shop_car->belongsToWare->is_discount;
            $order_detail->discount = parent::$user->hasOneUserType->discount;
            $order_detail->is_integral = $shop_car->belongsToWare->is_integral;
            $order_detail->cost_integral = $shop_car->belongsToWare->cost_integral;
            $order_detail->get_integral = $shop_car->belongsToWare->integral;
            $order_detail->save();
//            if (!$order_detail->save()) {
//                $i++;
//                continue;
//            }
            $cost_integral = $cost_integral + $order_detail->cost_integral;
        }
        return array('i' => $i, 'cost_integral' => $cost_integral);
    }
}