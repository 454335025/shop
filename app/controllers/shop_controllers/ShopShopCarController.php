<?php

use app\models\S_ShopCarts;

class ShopShopCarController extends BaseController
{
    public static $shop_carts;
    public static $cost_count = 0;

    public static function index()
    {
        self::$cost_count = self::getCostCount(parent::$user->hasManyShopCarts);
        parent::$view = View::make('shop_template.shop_car')
            ->with('cost_count', self::$cost_count)
            ->with('user', parent::$user)
            ->withTitle('购物车');
    }

    /**
     * 获取购物车总花费
     */

    public static function getCostCount($shop_carts, $use_integral = false)
    {
        $cost = 0;
        $discount = parent::$user->hasOneUserType->discount;
        foreach ($shop_carts as $shop_cart) {
            if ($shop_cart->belongsToWare->is_discount == 1) {
                $money = $shop_cart->belongsToWare->money * $discount;
            } else {
                $money = $shop_cart->belongsToWare->money;
            }
            $cost = $cost + ($money * $shop_cart->number);
        }

        if ($use_integral) {
            $cost = $cost - (int)(parent::$user->integral / parent::$user->hasOneUserType->min_integral) * parent::$user->hasOneUserType->exchange;
        }
        return $cost;
    }

    /**
     * 获取购物车总花费
     */

    public static function getIntegralCount($shop_carts)
    {
        $integral = 0;
        foreach ($shop_carts as $shop_cart) {
            $integral = $integral + ($shop_cart->belongsToWare->integral * $shop_cart->number);
        }
        return $integral;
    }

    /**
     * 修改购物车商品数量根据ID
     */

    public static function updateWareNumberById()
    {
        $id = $_REQUEST['id'];
        $action = $_REQUEST['action'];
        $num = $_REQUEST['num'];

        $shop_car = S_ShopCarts::find($id);
        if ($action == 'add') {
            $shop_car->number = $shop_car->number + $num;
        } else if ($action == 'sub') {
            $shop_car->number = $shop_car->number - $num;
            if ($shop_car->number < 1) {
                echo "<script>alert('未能修改成功');</script>";
                self::index();
                exit;
            }
        }
        if ($shop_car->save()) {
            self::index();
        } else {
            echo "<script>alert('未能修改成功');</script>";
        }
    }

    /**
     * 删除购物车商品根据ID
     */

    public static function deleteWareById()
    {
        $id = $_REQUEST['id'];
        $shop_car = S_ShopCarts::find($id);
        if ($shop_car->delete()) {
            self::index();
        } else {
            echo "<script>alert('未能删除成功');</script>";
        }
    }

    /**
     * 添加商品到购物车
     */

    public static function addWare()
    {
        $ware_id = $_REQUEST['ware_id'];
        $shop_car = S_ShopCarts::where('user_id', parent::$user->id)
            ->where('ware_id', $ware_id)
            ->first();
        $shop_car = $shop_car ? $shop_car : new S_ShopCarts();
        $shop_car->user_id = parent::$user->id;
        $shop_car->ware_id = $ware_id;
        $shop_car->number = $shop_car->number + 1;
        echo $shop_car->save() ? 1 : 0;
        exit;
    }
}