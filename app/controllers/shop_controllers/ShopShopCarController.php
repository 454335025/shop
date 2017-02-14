<?php

use app\models\S_ShopCarts;

class ShopShopCarController extends BaseController
{

    /**
     * 跳转购物车页面
     */
    public static function index()
    {
        parent::$view = View::make('shop_template.shop_car')
            ->with('cost_count', ShopOrderController::getActualCostCount())
            ->with('user', parent::$user)
            ->with('shop_carts', parent::$shop_carts)
            ->withTitle('购物车');
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
                echo 0;
                exit;
            }
        }
        if ($shop_car->save()) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
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
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
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
        if ($shop_car->save()) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }
}