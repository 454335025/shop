<?php

use app\models\S_OrderDetails;
use app\models\S_Orders;


class ManagerShopOrderDetailController extends ManagerController
{

    public function toShopOrderDetailUI()
    {
        $shop_order_id = $_REQUEST['shop_order_id'];
        $shop_order_order_id = $_REQUEST['shop_order_order_id'];
        parent::$view = MView::make('manager_template.shop_order_detail.shop_order_detail_list')
            ->with('shop_order', S_Orders::find($shop_order_id))
            ->with('shop_order_details', S_OrderDetails::where('order_id', $shop_order_order_id)->get())
            ->withTitle('订单详情列表');
    }

    public static function toShopOrderDetailAddUI()
    {
        parent::$view = View::make('manager_template.shop_order.shop_order_add')
            ->withTitle('添加订单');
    }

    public static function toShopOrderDetailUpdateUI()
    {
        $shop_order_id = $_REQUEST['shop_order_id'];
        parent::$view = View::make('manager_template.shop_order.shop_order_update')
            ->with('shop_order', S_Orders::find($shop_order_id))
            ->withTitle('修改订单');
    }

    public static function addShopOrderDetail()
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

    public static function updateShopOrderDetail()
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
    public static function deleteShopOrderDetail()
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