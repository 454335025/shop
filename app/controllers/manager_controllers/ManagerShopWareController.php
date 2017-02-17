<?php

use app\models\S_Ware;
use app\models\S_SubDirectories;

class ManagerShopWareController extends ManagerController
{

    public function toShopWareUI()
    {
        parent::$view = MView::make('manager_template.shop_ware.shop_ware_list')
            ->with('shop_wares', S_Ware::all())
            ->withTitle('商品列表');
    }

    public static function toShopWareAddUI()
    {
        parent::$view = View::make('manager_template.shop_ware.shop_ware_add')
            ->with('shop_sub_directories', S_SubDirectories::all())
            ->withTitle('添加商品');
    }

    public static function toShopWareUpdateUI()
    {
        $shop_ware_id = $_REQUEST['shop_ware_id'];
        parent::$view = View::make('manager_template.shop_ware.shop_ware_update')
            ->with('shop_ware', S_Ware::find($shop_ware_id))
            ->withTitle('修改商品');
    }

    public static function toShopWareImageUpdateUI()
    {
        $shop_ware_id = $_REQUEST['shop_ware_id'];
        parent::$view = View::make('manager_template.shop_ware.shop_ware_image_update')
            ->with('shop_ware', S_Ware::find($shop_ware_id))
            ->withTitle('修改商品图片');
    }

    public static function addShopWare()
    {
        $name = $_REQUEST['name'];
        $remark = $_REQUEST['remark'];
        $shop_directory_id = $_REQUEST['shop_directory_id'];
        $shop_sub_directory_id = $_REQUEST['shop_sub_directory_id'];
        $sort = $_REQUEST['sort'];
        $is_discount = $_REQUEST['is_discount'];
        $original_money = $_REQUEST['original_money'];
        $money = $_REQUEST['money'];
        $integral = $_REQUEST['integral'];
        $parameter = $_REQUEST['parameter'];
        $is_integral = $_REQUEST['is_integral'];
        $cost_integral = $_REQUEST['cost_integral'];
        $shop_ware = new S_Ware();
        $shop_ware->name = $name;
        $shop_ware->remark = $remark;
        $shop_ware->shop_directory_id = $shop_directory_id;
        $shop_ware->shop_sub_directory_id = $shop_sub_directory_id;
        $shop_ware->sort = $sort;
        $shop_ware->is_discount = $is_discount;
        $shop_ware->original_money = $original_money;
        $shop_ware->money = $money;
        $shop_ware->integral = $integral;
        $shop_ware->parameter = $parameter;
        $shop_ware->is_integral = $is_integral;
        $shop_ware->cost_integral = $cost_integral;
        if ($shop_ware->save()) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }

    }

    public static function updateShopWare()
    {
        $shop_ware_id = $_REQUEST['shop_ware_id'];
        $name = $_REQUEST['name'];
        $remark = $_REQUEST['remark'];
        $shop_directory_id = $_REQUEST['shop_directory_id'];
        $shop_sub_directory_id = $_REQUEST['shop_sub_directory_id'];
        $sort = $_REQUEST['sort'];
        $is_discount = $_REQUEST['is_discount'];
        $original_money = $_REQUEST['original_money'];
        $money = $_REQUEST['money'];
        $integral = $_REQUEST['integral'];
        $parameter = $_REQUEST['parameter'];
        $is_integral = $_REQUEST['is_integral'];
        $cost_integral = $_REQUEST['cost_integral'];
        $shop_ware = S_Ware::find($shop_ware_id);
        $shop_ware->name = $name;
        $shop_ware->remark = $remark;
        $shop_ware->shop_directory_id = $shop_directory_id;
        $shop_ware->shop_sub_directory_id = $shop_sub_directory_id;
        $shop_ware->sort = $sort;
        $shop_ware->is_discount = $is_discount;
        $shop_ware->original_money = $original_money;
        $shop_ware->money = $money;
        $shop_ware->integral = $integral;
        $shop_ware->parameter = $parameter;
        $shop_ware->is_integral = $is_integral;
        $shop_ware->cost_integral = $cost_integral;
        if ($shop_ware->save()) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }

    /**
     * 删除商品
     */
    public static function deleteShopWare()
    {
        $shop_ware_id = $_REQUEST['shop_ware_id'];
        $shop_ware = S_Ware::find($shop_ware_id);
        if ($shop_ware->delete()) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }

    public static function updateShopWareImage()
    {
        $shop_ware_id = $_REQUEST['shop_ware_id'];
        $file = $_FILES['main_img'];

        if ($file && $file['size'] != 0) {
            $upload_url = "images/shop/ware/detail/main_img_$shop_ware_id." . explode('.', $file['name'])[1];
            move_uploaded_file($file["tmp_name"], $upload_url);
            $shop_ware = S_Ware::find($shop_ware_id);
            $upload_url = '/' . $upload_url;
            $shop_ware->main_img = $upload_url;
            $shop_ware->detail_img = $upload_url;
            if ($shop_ware->save()) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        } else {
            echo 0;
            exit;
        }
    }

}