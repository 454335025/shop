<?php

use app\models\S_UserType;
use app\models\S_User;

class ManagerUserTypeController extends ManagerController
{

    public function toUserTypeUI()
    {
        parent::$view = MView::make('manager_template.user_type.user_type_list')
            ->with('user_types', S_UserType::all())
            ->withTitle('用户类型列表');
    }

    public static function toUserTypeAddUI()
    {
        parent::$view = View::make('manager_template.user_type.user_type_add')
            ->withTitle('添加用户类型');
    }

    public static function toUserTypeUpdateUI()
    {
        $user_type_id = $_REQUEST['user_type_id'];
        parent::$view = View::make('manager_template.user_type.user_type_update')
            ->with('user_type', S_UserType::find($user_type_id))
            ->withTitle('修改用户类型');
    }

    public static function addUserType()
    {
        $type = $_REQUEST['type'];
        $discount = $_REQUEST['discount'];
        $min_integral = $_REQUEST['min_integral'];
        $exchange = $_REQUEST['exchange'];
        $user_type = new S_UserType();
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

    public static function updateUserType()
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
    public static function deleteUserType()
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