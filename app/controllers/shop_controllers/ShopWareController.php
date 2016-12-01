<?php

use app\models\S_Ware;

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

    /**
     * 跳转商品详情页面
     */
    public function index()
    {
        self::$wares = self::getWareById(self::$ware_id);
        self::getParameter(self::$wares);
        $count = new ShopMainController();
        $count = $count->getShopCarCount();
        self::$view = View::make('shop_template.ware')
            ->with('wares', self::$wares)
            ->with('parameters', self::$parameters)
            ->with('count', $count)
            ->withTitle(self::$wares->name);
    }

    /**
     * 获取商品信息根据Id
     */
    public static function getWareById($ware_id)
    {
        return S_Ware::find($ware_id);
    }

    /**
     * 获取详细参数根据parameter
     */
    public static function getParameter($wares)
    {
        if ($wares->parameter != '') {
            $detail = explode(';', $wares->parameter);
            foreach ($detail as $key => $val) {
                $a = explode(':', $val);
                self::$parameters[$a[0]] = $a[1];
            }
        } else {
            self::$parameters['描述'] = '无产品描述';
        }
    }


}