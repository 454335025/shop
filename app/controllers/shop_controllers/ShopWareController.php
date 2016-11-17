<?php

use app\models\Ware;

class ShopWareController extends BaseController
{
    private static $ware_id;
    private static $wares;
    private static $parameters;

    public function __construct()
    {
        parent::__construct();
        self::$ware_id = $_REQUEST['ware_id'];
    }

    public function index()
    {
        self::$wares = self::getWareById(self::$ware_id);
        self::getParameter(self::$wares);
        $count = new ShopMainController();
        $count = $count->getShopCarCount();
        self::$view = View::make('shop_template.ware_detail')
            ->with('wares', self::$wares)
            ->with('parameters', self::$parameters)
            ->with('count', $count)
            ->withTitle(self::$wares->name);
    }

    /**
     * 获取商品信息根据Id
     */
    public function getWareById($ware_id)
    {
         return Ware::find($ware_id)->first();
    }

    /**
     * 获取详细参数根据parameter
     */
    public function getParameter($wares)
    {
        $detail = explode(';', $wares->parameter);
        foreach ($detail as $key => $val) {
            $a = explode(':', $val);
            self::$parameters[$a[0]] = $a[1];
        }
    }


}