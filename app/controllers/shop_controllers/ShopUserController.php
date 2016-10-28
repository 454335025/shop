<?php

use app\models\UserType;

class ShopUserController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $user_type = UserType::where('id', parent::$user->user_type)->first();

        $this->view = View::make('shop_template.user')
            ->with('user', parent::$user)
            ->with('user_type', $user_type)
            ->withTitle('我的信息');


    }
}