<?php

use app\models\S_User;
use app\models\S_UserType;

class ManagerShopUserController extends ManagerController
{

    public function toShopUserUI()
    {
        parent::$view = MView::make('manager_template.shop_user.shop_user_list')
            ->with('shop_users', S_User::all())
            ->withTitle('用户列表');
    }

    public static function toShopUserAddUI()
    {
        parent::$view = View::make('manager_template.shop_user.shop_user_add')
            ->withTitle('添加用户');
    }

    public static function toShopUserUpdateUI()
    {
        $shop_user_id = $_REQUEST['shop_user_id'];
        parent::$view = View::make('manager_template.shop_user.shop_user_update')
            ->with('shop_user', S_User::find($shop_user_id))
            ->with('shop_user_types', S_UserType::all())
            ->withTitle('修改用户');
    }

    public static function addShopUser()
    {
        $username = $_REQUEST['username'];
        $shop_user_type_id = $_REQUEST['shop_user_type_id'];
        $realname = $_REQUEST['realname'];
        $address = $_REQUEST['address'];
        $phone = $_REQUEST['phone'];
        $email = $_REQUEST['email'];
        $integral = $_REQUEST['integral'];
        $shop_user = new S_User();
        $shop_user->username = $username;
        $shop_user->shop_user_type_id = $shop_user_type_id;
        $shop_user->realname = $realname;
        $shop_user->address = $address;
        $shop_user->phone = $phone;
        $shop_user->email = $email;
        $shop_user->integral = $integral;
        if ($shop_user->save()) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }

    }

    public static function updateShopUser()
    {
        $shop_user_id = $_REQUEST['shop_user_id'];
        $username = $_REQUEST['username'];
        $shop_user_type_id = $_REQUEST['shop_user_type_id'];
        $realname = $_REQUEST['realname'];
        $address = $_REQUEST['address'];
        $phone = $_REQUEST['phone'];
        $email = $_REQUEST['email'];
        $integral = $_REQUEST['integral'];
        $shop_user = S_User::find($shop_user_id);
        $shop_user->username = $username;
        $shop_user->user_type = $shop_user_type_id;
        $shop_user->realname = $realname;
        $shop_user->address = $address;
        $shop_user->phone = $phone;
        $shop_user->email = $email;
        $shop_user->integral = $integral;
        if ($shop_user->save()) {
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
    public static function deleteShopUser()
    {
        $shop_user_id = $_REQUEST['shop_user_id'];
        $shop_user = S_User::find($shop_user_id);
        if ($shop_user->delete()) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }

}