<?php

/**
 * Created by PhpStorm.
 * User: GE62
 * Date: 2016/10/13
 * Time: 15:37
 */
class ShopStatementController extends BaseController
{

    public function index()
    {
        $this->view = View::make('shop_template.statement');
    }
}