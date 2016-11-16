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
    public static $sub_directory_id;

    public function __construct()
    {
        parent::__construct();
        //商品名称
        self::$ware_name = !empty($_REQUEST['ware_name']) ? $_REQUEST['ware_name'] : '';
        self::$sub_directory_id = !empty($_REQUEST['sub_directory_id']) ? $_REQUEST['sub_directory_id'] : '';
    }

    public function index()
    {
        self::$directories = self::getDirectories();
        self::$wares = self::getWares();
        self::$shop_cart_count = self::getShopCarCount();
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
        return Directories::all()->sortBy('sort');
    }

    /**
     * 获取商品信息
     */
    public function getWares()
    {
        if (self::$sub_directory_id != '' && self::$ware_name!='') {
            $wares = Ware::all()
                ->where('name', 'like', '%' . self::$ware_name . '%')
                ->where('sub_directory_id', self::$sub_directory_id)
                ->sortBy('sort');
        } else {
            $wares = Ware::all()
                ->sortBy('sort');
        }
        return $wares;
    }

    /**
     * 获取购物车商品总数
     */
    public function getShopCarCount()
    {
        return ShopCarts::where('user_id', parent::$user->id)->count();
    }
}