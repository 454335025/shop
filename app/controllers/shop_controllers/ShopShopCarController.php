<?php

use app\models\ShopCarts;

class ShopShopCarController extends BaseController
{
    public static $shop_carts;
    public static $cost_count = 0;

    public static function index()
    {
        self::getWareByWareId();
        self::getCostCount();
        parent::$view = View::make('shop_template.shop_car')
            ->with('shop_carts', self::$shop_carts)
            ->with('cost_count', self::$cost_count)
            ->with('user', parent::$user)
            ->withTitle('购物车');
    }

    /**
     * @return static
     * 获取商品信息根据 商品id(ware_id)
     */
    public static function getWareByWareId()
    {
        self::$shop_carts = ShopCarts::all()->where('user_id', parent::$user->id);
    }

    /**
     * 获取购物车总花费
     */

    public static function getCostCount()
    {
        foreach (self::$shop_carts as $shop_cart) {
            self::$cost_count = self::$cost_count + ($shop_cart->belongsToWare->money * $shop_cart->number);
        }
    }

    /**
     * 修改购物车商品数量根据ID
     */

    public static function updateWareNumberById()
    {
        $id = $_REQUEST['id'];
        $action = $_REQUEST['action'];
        $num = $_REQUEST['num'];

        $shop_car = ShopCarts::find($id);
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
        $shop_car = ShopCarts::find($id);
        if ($shop_car->delete()) {
            self::index();
        } else {
            echo "<script>alert('未能删除成功');</script>";
        }
    }
}