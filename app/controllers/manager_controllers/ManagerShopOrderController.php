<?php

use app\models\S_Orders;

class ManagerShopOrderController extends ManagerController
{

    public function toShopOrderUI()
    {
        parent::$view = MView::make('manager_template.shop_order.shop_order_list')
            ->with('shop_orders', S_Orders::all()->sortByDesc('updated_at'))
            ->withTitle('订单列表');
    }

    public static function toShopOrderAddUI()
    {
        parent::$view = View::make('manager_template.shop_order.shop_order_add')
            ->withTitle('添加订单');
    }

    public static function toShopOrderUpdateUI()
    {
        $shop_order_id = $_REQUEST['shop_order_id'];
        parent::$view = View::make('manager_template.shop_order.shop_order_update')
            ->with('shop_order', S_Orders::find($shop_order_id))
            ->withTitle('修改订单');
    }

    public static function addShopOrder()
    {
        $shop_order = new S_Orders();

        if ($shop_order->save()) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }

    }

    public static function updateShopOrder()
    {
        $shop_order_id = $_REQUEST['shop_order_id'];
        $shop_order = S_Orders::find($shop_order_id);
        $shop_order->type = 2;
        if ($shop_order->save()) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }

    }

    /**
     * 删除订单
     */
    public static function deleteShopOrder()
    {
        $shop_order_id = $_REQUEST['shop_order_id'];
        $shop_order = S_Orders::find($shop_order_id);
        if ($shop_order->delete()) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }

}