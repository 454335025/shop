<?php
use app\models\Directories;
use app\models\Ware;
use app\models\ShopCarts;

class ShopMainController extends BaseController
{
    public static $ware_name;
    public static $directories;
    public static $wares;
    public static $shop_cart_count;

    public function __construct()
    {
        parent::__construct();
        //商品名称
        self::$ware_name = !empty($_REQUEST['ware_name']) ? $_REQUEST['ware_name'] : '';
    }

    public function index()
    {
        self::getDirectories();
        self::getWares();
        self::getShopCarCount();
        self::$view = View::make('shop_template.main')
            ->with('directories', self::$directories)
            ->with('wares', self::$wares)
            ->with('shop_cart_count', self::$shop_cart_count)
            ->with('openid', parent::$openid);
    }

    /**
     * 获取目录信息
     */

    public function getDirectories()
    {
        self::$directories = Directories::all()->sortBy('sort');
    }

    /**
     * 获取商品信息
     */
    public function getWares()
    {
        if (self::$ware_name != '') {
            self::$wares = Ware::all()->where('name', 'like', '%' . self::$ware_name . '%')->sortBy('sort');
        } else {
            self::$wares = Ware::all()->sortBy('sort');
        }
    }

    /**
     * 获取购物车商品总数
     */
    public function getShopCarCount()
    {
        self::$shop_cart_count = ShopCarts::where('user_id', parent::$user->id)->count();
    }
}