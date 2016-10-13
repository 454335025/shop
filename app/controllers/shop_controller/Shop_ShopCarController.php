<?php

/**
 * Created by PhpStorm.
 * User: GE62
 * Date: 2016/10/13
 * Time: 15:36
 */
class Shop_ShopCarController extends BaseController
{
    public function index()
    {
        $this->view = View::make('shop_template.shop_car');
    }

}