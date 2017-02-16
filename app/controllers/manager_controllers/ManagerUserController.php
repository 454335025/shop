<?php

use app\models\M_Users;

class ManagerUserController extends ManagerController
{

    public function toUserUI()
    {
        parent::$view = MView::make('manager_template.user.user_list')
            ->with('users', self::getUser())
            ->withTitle('用户列表');
    }

    public static function toUserAddUI()
    {
        parent::$view = View::make('manager_template.user.user_add')
            ->withTitle('添加用户');
    }

    public static function toUserUpdateUI()
    {
        $user_id = $_REQUEST['user_id'];
        parent::$view = View::make('manager_template.user.user_update')
            ->with('user', M_Users::find($user_id))
            ->withTitle('修改用户');
    }

    public static function getUser()
    {
        return M_Users::all()->sortByDesc('updated_at');
    }

    public static function addUser()
    {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $email = $_REQUEST['email'];
        $phone = $_REQUEST['phone'];
        $admin = $_REQUEST['admin'];
        $password_Hash = password_hash(
            $password,
            PASSWORD_DEFAULT,
            ['cost' => 12]
        );

        $user = new M_Users();
        $user->username = $username;
        $user->password = $password_Hash;
        $user->email = $email;
        $user->phone = $phone;
        $user->isroot = $admin;
        if ($user->save()) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }

    }

    public static function updateUser()
    {
        $user_id = $_REQUEST['user_id'];
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $email = $_REQUEST['email'];
        $phone = $_REQUEST['phone'];
        $admin = $_REQUEST['admin'];

        $password_Hash = password_hash(
            $password,
            PASSWORD_DEFAULT,
            ['cost' => 12]
        );

        $user = M_Users::find($user_id);
        $user->username = $username;
        $user->password = $password_Hash;
        $user->email = $email;
        $user->phone = $phone;
        $user->admin = $admin;
        if ($user->save()) {
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
    public static function deleteUser()
    {
        $user_id = $_REQUEST['user_id'];
        $user = M_Users::find($user_id);
        if ($user->delete()) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }

}