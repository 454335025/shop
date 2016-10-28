<?php

use app\models\Directories;
use app\models\SubDirectories;
use app\models\Ware;
use app\models\ShopCarts;

class ShopMainController extends BaseController
{
    public static $ware_name;

    public function __construct()
    {
        parent::__construct();
        //商品名称
        self::$ware_name = !empty($_REQUEST['ware_name']) ? $_REQUEST['ware_name'] : '';

    }

    public function index()
    {

        $directories = self::getDirectories();

        $wares = self::getWares();

        $shop_cart_count = ShopCarts::where('user_id',parent::$user->id)->count();

        $this->view = View::make('shop_template.main')
            ->with('directories', $directories)
            ->with('wares', $wares)
            ->with('shop_cart_count', $shop_cart_count)
            ->with('openid', parent::$openid);

    }


    /**
     * @return $this
     * 获取目录信息
     */

    public static function getDirectories()
    {

        $directories = Directories::all()->sortBy('sort');

        foreach ($directories as $directory) {

            $directory->sub_directories = SubDirectories::all()->where('directory_id', $directory->id)->sortBy('sort');

        }

        return $directories;
    }

    /**
     * @return $this
     * 获取商品信息
     */
    public static function getWares()
    {

        if (self::$ware_name != '') {

            return Ware::all()->where('name', 'like', '%' . self::$ware_name . '%')->sortBy('sort');

        } else {

            return Ware::all()->sortBy('sort');

        }


    }


}