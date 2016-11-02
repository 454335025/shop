<?php


class ShopWareController extends BaseController
{


    public function index()
    {
        $this->view = View::make('shop_template.my_order');
    }


}