<?php

use app\models\M_Users;

class ManagerUserController extends ManagerController
{

    public function toUserUI()
    {
        parent::$view = View::make('manager_template.common.index')
            ->with('users', self::getUser())
            ->withTitle('用户列表')
            ->withUi('user/user_list');
    }

    public static function toUserAddUI()
    {
        parent::$view = View::make('manager_template.common.index')
            ->with('users', self::getUser())
            ->withTitle('添加用户')
            ->withUi('user/user_add');
    }

    public static function toUserUpdateUI()
    {
        parent::$view = View::make('manager_template.common.index')
            ->with('users', self::getUser())
            ->withTitle('修改用户')
            ->withUi('user/user_update');
    }

    public static function getUser()
    {
        return M_Users::all()->sortByDesc('updated_at');
    }

}