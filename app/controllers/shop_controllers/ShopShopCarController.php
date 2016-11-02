<?php

use app\models\ShopCarts;
use app\models\Ware;

class ShopShopCarController extends BaseController
{
    public static $shop_carts;
    public static $cost_count = 0;

    public function __construct()
    {
        parent::__construct();
    }

    public static function index()
    {
        self::getWareByWareId();
        self::getCostCount();
        parent::$view = View::make('shop_template.shop_car1')
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
        foreach (self::$shop_carts as $shop_cart) {
            $shop_cart->ware = Ware::where('id', $shop_cart->ware_id)->first();
        }
    }

    /**
     * 获取购物车总花费
     */

    public static function getCostCount()
    {
        foreach (self::$shop_carts as $shop_cart) {
            self::$cost_count = self::$cost_count + ($shop_cart->ware->money * $shop_cart->number);
        }
    }

    /**
     * 修改购物车商品数量根据ID
     */

    public static function updateWareNumberById()
    {
        $action = $_REQUEST['action'];
        $id = $_REQUEST['id'];
        $shop_car = ShopCarts::find($id);
        if ($action == 'add') {
            $shop_car->number = $shop_car->number + 1;
        } else if ($action == 'sub') {
            $shop_car->number = $shop_car->number - 1;
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