<?php


class ShopWareController extends BaseController
{
    public static $ware_id;


    public function __construct()
    {
        parent::__construct();
        self::$ware_id = $_REQUEST['ware_id'];
    }

    public function index()
    {
        self::$view = View::make('shop_template.ware_detail')
            ->withTitle('商品描述');
    }


}