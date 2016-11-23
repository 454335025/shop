<?php

/**
 * Created by PhpStorm.
 * User: GE62
 * Date: 2016/11/23
 * Time: 18:52
 */
class ManagerUserController extends ManagerController
{

    public function index()
    {
        self::$view = View::make('manager_template.common.index')
            ->withUi('user/user_list');
    }

}