<?php

use app\models\S_UserAddress;
use app\models\S_Orders;

class ShopUserController extends BaseController
{
    private static $user_addresses;

    /**
     * 跳转我的信息页面
     */
    public function index()
    {
        self::$view = View::make('shop_template.user')
            ->with('user', parent::$user)
            ->withTitle('我的信息');
    }

    /**
     * 跳转我的订单页面
     */
    public static function toOrderUI()
    {
        $orders = !empty($_REQUEST['type'])
            ? S_Orders::where('type', $_REQUEST['type'])->where('user_id', parent::$user->id)->get()
            : parent::$user->hasManyOrders;
//        echo $_REQUEST['type'];exit;
        self::$view = View::make('shop_template.user_order')
            ->with('user', parent::$user)
            ->with('orders', $orders)
            ->withTitle('我的订单');
    }

    /**
     * 跳转收货地址页面
     */
    public static function toAddressUI()
    {
        self::$view = View::make('shop_template.user_address')
            ->with('user', parent::$user)
            ->withTitle('我的地址');
    }

    /**
     * 跳转添加收货地址页面
     */
    public static function toAddressAddUI()
    {
        self::$view = View::make('shop_template.user_address_add')
            ->withTitle('添加信息地址');
    }

    /**
     * 获取默认收货地址
     * @return mixed
     */
    public static function getUserAddressIdByUserId()
    {
        $user_address = S_UserAddress::where('user_id', self::$user->id)->sortByDesc('isdefault')->get(0);
        return $user_address->id;
    }

    /**
     * 添加收货地址
     */
    public static function addAddress()
    {
        $address = $_REQUEST['address'];
        $realname = $_REQUEST['realname'];
        $phone = $_REQUEST['phone'];
        $bio = $_REQUEST['bio'];
        $user_address = new S_UserAddress();
        $user_address->user_id = parent::$user->id;
        $user_address->address = $address;
        $user_address->realname = $realname;
        $user_address->phone = $phone;
        $user_address->bio = $bio;
        if ($user_address->save()) {
            echo 1;
        }
        exit;
    }

    /**
     * 修改收货地址
     */
    public static function updateAddress()
    {
        $id = $_REQUEST['id'];
        S_UserAddress::where('user_id', parent::$user->id)->update(['isdefault' => 0]);
        $user_address = S_UserAddress::find($id);
        $user_address->isdefault = 1;
        if ($user_address->save()) {
            echo 1;
        }
        exit;
    }

    /**
     * 删除收货地址
     */
    public static function deleteAddress()
    {
        $id = $_REQUEST['id'];
        $user_address = S_UserAddress::find($id);
        if ($user_address->delete()) {
            echo 1;
        }
        exit;

    }
}