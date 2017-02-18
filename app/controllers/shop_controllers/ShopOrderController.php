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
        if (S_ShopCarts::where('user_id', parent::$user->id)->count() <= 0) {
            echo "<script>
                alert('购物车里没有商品,快去商城添加吧');
                window.location.href='/shop/main';</script>";
            exit;
        }
        $get_integral_count = self::getIntegralCount();
        $surplus_integral = self::isMyIntegral();
        if ($surplus_integral !== false) {
            self::$view = View::make('shop_template.order')
                ->with('user', parent::$user)
                ->with('shop_carts', parent::$shop_carts)
                ->with('cost_count', $cost_count)
                ->with('get_integral_count', $get_integral_count)
                ->with('surplus_integral', $surplus_integral)
                ->withTitle('我的订单');

        } else {
            echo "<script>
                alert('您的积分不足以兑换购物车的商品');
                window.location.href='/shop/shop_car';</script>";
            exit;
        }
    }

    /**
     *跳转修改默认地址页面
     */
    public static function toAddressUpdateUI()
    {
        self::$view = View::make('shop_template.order_address_update')
            ->with('user', parent::$user)
            ->withTitle('update_address');
    }

    /**
     * 获取积分(是否使用积分抵扣)
     */
    public static function getIntegralByIsUse()
    {
        $is_use = $_REQUEST['is_use'];
        $is_use == 'true' ? $is_use = true : $is_use = false;
        if ($is_use) {
            $integral = parent::$user->integral - self::isMyIntegral() + self::getCostIntegral();
        } else {
            $integral = parent::$user->integral - self::isMyIntegral();
        }
        echo $integral;
        exit;
    }

    /**
     * 获取金额(是否使用积分抵扣)
     */
    public static function getMoneyByIsUse()
    {
        $is_use = $_REQUEST['is_use'];
        $is_use == 'true' ? $is_use = true : $is_use = false;
        $money = self::getActualCostCount() - self::getCostCountByIntegral($is_use);
        echo $money;
        exit;
    }

    /**
     * 获取总花费金额
     * @return int
     */
    public static function getCostCount()
    {
        $cost = 0;
        foreach (parent::$shop_carts as $shop_cart) {
            if ($shop_cart->belongsToWare->is_integral != 1) {
                $money = $shop_cart->belongsToWare->money;
                $cost = $cost + ($money * $shop_cart->number);
            }
        }
        return $cost;
    }

    /**
     * 获取实际花费金额
     * @return int
     */
    public static function getActualCostCount()
    {
        $cost = 0;
        $discount = parent::$user->hasOneUserType->discount;
        foreach (parent::$shop_carts as $shop_cart) {
            if ($shop_cart->belongsToWare->is_integral != 1) {
                if ($shop_cart->belongsToWare->is_discount == 1) {
                    $money = $shop_cart->belongsToWare->money * $discount;
                } else {
                    $money = $shop_cart->belongsToWare->money;
                }
                $cost = $cost + ($money * $shop_cart->number);
            }
        }
        return $cost;
    }

    /**
     * 获取抵扣金钱
     * @return int
     */
    public static function getCostCountByIntegral($is_use = false)
    {
        if ($is_use) {
            if (parent::$user->hasOneUserType->min_integral == 0) {
                $cost = self::getCostIntegral() * parent::$user->hasOneUserType->exchange;
            } else {
                $cost = self::getCostIntegral() / parent::$user->hasOneUserType->min_integral * parent::$user->hasOneUserType->exchange;
            }
        } else {
            $cost = 0;
        }
        return $cost;

    }

    /**
     * 获取最大可用抵扣积分
     * @return int
     */
    public static function getCostIntegral()
    {
        if (parent::$user->hasOneUserType->exchange == 0) {
            $integral = 0;
        } else {
            $need_integral = (int)(self::getActualCostCount() / parent::$user->hasOneUserType->exchange) * parent::$user->hasOneUserType->min_integral;
            if (self::isMyIntegral() - $need_integral > 0) {
                $integral = $need_integral;
            } else if (parent::$user->hasOneUserType->min_integral == 0) {
                $integral = self::isMyIntegral();
            } else {
                $integral = ((int)(self::isMyIntegral() / parent::$user->hasOneUserType->min_integral)) * parent::$user->hasOneUserType->min_integral;
            }
        }
        return $integral;
    }

    /**
     * 获取需要兑换商品积分总数
     * @return int
     */
    public static function getIntegralCount()
    {
        $integral = 0;
        foreach (parent::$shop_carts as $shop_cart) {
            $integral = $integral + ($shop_cart->belongsToWare->integral * $shop_cart->number);
        }
        return $integral;
    }

    /**
     * 获取我的剩余积分
     * @return bool
     */
    public static function isMyIntegral()
    {
        $surplus_integral = parent::$user->integral;
        foreach (parent::$shop_carts as $shop_cart) {
            if ($shop_cart->belongsToWare->is_integral == 1) {
                $surplus_integral = $surplus_integral - $shop_cart->belongsToWare->cost_integral * $shop_cart->number;
            }
        }
        if ($surplus_integral < 0) {
            return false;
        } else {
            return $surplus_integral;
        }
    }

    /**
     *添加订单
     */
    public static function addOrders()
    {
        $is_use = $_REQUEST['is_use'];
        $user_address_id = ShopUserController::getUserAddressIdByUserId();
        if (count(parent::$shop_carts) >0) {
            if ($user_address_id) {
                $order_id = self::createOrderNum();
                $is_use == 'true' ? $is_use = true : $is_use = false;
                $order_detail = self::addOrderDetail($order_id);
                if ($order_detail['i'] != 0) {
                    S_OrderDetails::where('order_id', $order_id)->delete();
                    $data = array('data' => 3, 'msg' => 'create order error');
                } else{
                    if (self::addOrder($order_id, $is_use, $order_detail, $user_address_id)) {
                        parent::$user->integral = parent::$user->integral - $order_detail['cost_integral'] - self::getCostIntegral();
                        parent::$user->save();
                        $data = array('data' => 1, 'msg' => '订单已经成功生成');
                        S_ShopCarts::where('user_id', parent::$user->id)->delete();
                    } else {
                        S_OrderDetails::where('order_id', $order_id)->delete();
                        $data = array('data' => 2, 'msg' => '订单生产失败');
                    }
                }
            } else {
                $data = array('data' => 4, 'msg' => '先去添加收货地址吧');
            }
        } else {
            $data = array('data' => 3, 'msg' => '购物车为空');
        }
        echo json_encode($data);
        exit;
    }

    /**
     * 添加订单信息
     * @param $order_id 订单编号
     * @param $is_use 是否使用积分
     * @param $order_detail 订单商品详情添加状态
     * @return bool
     */
    public static function addOrder($order_id, $is_use, $order_detail, $user_address_id)
    {
        $order = new S_Orders();
        $order->order_id = $order_id;
        $order->user_id = parent::$user->id;
        $order->get_integral = self::getIntegralCount();
        $order->user_address_id = $user_address_id;
        $order->money = self::getCostCount();
        $order->actual_money = self::getActualCostCount() - self::getCostCountByIntegral($is_use);
        $order->discount = parent::$user->hasOneUserType->discount;
        $order->discount_money = self::getCostCount() - self::getActualCostCount();
        $order->is_use_integral = $is_use ? 1 : 0;
        $order->cost_integral = $order_detail['cost_integral'] + $is_use ? self::getCostIntegral() : 0;
        $order->integral_money = self::getCostCountByIntegral($is_use);
        return $order->save();

    }

    /**
     * 添加订单商品信息
     * @param $order_id 订单编号
     * @return array
     */
    public static function addOrderDetail($order_id)
    {
        $cost_integral = 0;
        $actual_money = 0;
        $i = 0;
        foreach (parent::$shop_carts as $shop_cart) {
            $order_detail = new S_OrderDetails();
            $order_detail->order_id = $order_id;
            $order_detail->ware_id = $shop_cart->belongsToWare->id;
            $order_detail->money = $shop_cart->belongsToWare->money;
            if($shop_cart->is_integral == 1){
                $order_detail->actual_money = $shop_cart->belongsToWare->money * parent::$user->hasOneUserType->discount;
                $cost_integral = $cost_integral + $shop_cart->belongsToWare->cost_integral;
            }
            $order_detail->actual_money = $shop_cart->belongsToWare->money;
            $order_detail->number = $shop_cart->number;
            $order_detail->is_discount = $shop_cart->belongsToWare->is_discount;
            $order_detail->discount = parent::$user->hasOneUserType->discount;
            $order_detail->is_integral = $shop_cart->belongsToWare->is_integral;
            $order_detail->cost_integral = $shop_cart->belongsToWare->cost_integral;
            $order_detail->get_integral = $shop_cart->belongsToWare->integral;
            if (!$order_detail->save()) {
                $i++;
                continue;
            }
            if($order_detail->is_integral == 1){
                $cost_integral = $cost_integral + $shop_cart->belongsToWare->cost_integral;
            }
            if($order_detail->is_discount == 1){
                $actual_money = $actual_money + $shop_cart->belongsToWare->money;
            }

        }
        return array('i' => $i, 'cost_integral' => $cost_integral,'actual_money'=>$actual_money);
    }

    /**
     * 修改订单类型
     */
    public static function updateOrderType()
    {
        $order_id = $_REQUEST['order_id'];
        S_Orders::where('order_id', $order_id)->update(['type' => 3]);
        echo 1;
        exit;
    }

    /**
     * 生成订单号
     * @return string
     */
    public static function createOrderNum()
    {
        return 'DDBH' . (date('YmdHis', time()) . rand(100000, 999999));
    }
}