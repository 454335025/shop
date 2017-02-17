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

    public static function addShopWare()
    {
        $name = $_REQUEST['name'];
        $remark = $_REQUEST['remark'];
        $shop_directory_id = $_REQUEST['shop_directory_id'];
        $shop_sub_directory_id = $_REQUEST['shop_sub_directory_id'];
        $sort = $_REQUEST['sort'];


        $shop_ware = new S_Ware();

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
        $user_type_id = $_REQUEST['user_type_id'];
        $type = $_REQUEST['type'];
        $discount = $_REQUEST['discount'];
        $min_integral = $_REQUEST['min_integral'];
        $exchange = $_REQUEST['exchange'];
        $user_type = S_UserType::find($user_type_id);
        $user_type->type = $type;
        $user_type->discount = $discount;
        $user_type->min_integral = $min_integral;
        $user_type->exchange = $exchange;
        if ($user_type->save()) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }

    /**
     * 删除用户
     */
    public static function deleteShopWare()
    {
        $user_type_id = $_REQUEST['user_type_id'];
        $user_type = S_UserType::find($user_type_id);
        $user = S_User::where('user_type',$user_type_id)->count();
        if($user<1){
            if ($user_type->delete()) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        }else {
            echo 2;
            exit;
        }

    }

}