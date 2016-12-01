<?php
use app\models\S_Directories;
use app\models\S_Ware;
use app\models\S_ShopCarts;

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

    /**
     * 跳转商城主页页面
     */
    public function index()
    {
        self::$directories = self::getDirectories();
        self::$wares = self::getWares(self::$ware_name, self::$sub_directory_id);
        self::$shop_cart_count = self::getShopCarCount();
        self::$view = View::make('shop_template.main')
            ->with('directories', self::$directories)
            ->with('wares', self::$wares)
            ->with('shop_cart_count', self::$shop_cart_count)
            ->with('openid', parent::$openid)
            ->withTitle('main');
    }

    /**
     * 获取目录信息
     * @return $this
     */

    public function getDirectories()
    {
        return S_Directories::all()->sortBy('sort');
    }

    /**
     * 获取商品信息
     * @param $ware_name
     * @param $sub_directory_id
     * @return mixed
     */
    public function getWares($ware_name, $sub_directory_id)
    {
        if ($sub_directory_id != '') {
            $wares = S_Ware::where('sub_directory_id', $sub_directory_id)
                ->orderBy('sort')
                ->get();
        } else {
            $wares = S_Ware::where('name', 'like', '%' . $ware_name . '%')
                ->orderBy('sort')
                ->get();
        }
        return $wares;
    }

    /**
     * 获取购物车商品总数
     */
    public function getShopCarCount()
    {
        return S_ShopCarts::where('user_id', parent::$user->id)->count();
    }
}