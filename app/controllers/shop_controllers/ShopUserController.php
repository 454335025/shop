<?php

use app\models\S_UserAddress;

class ShopUserController extends BaseController
{
    private static $user_addresses;

    public function index()
    {
        self::$view = View::make('shop_template.user')
            ->with('user', parent::$user)
            ->withTitle('我的信息');
    }

    public static function toOrderUI()
    {
        self::$view = View::make('shop_template.user_order')
            ->withTitle('我的订单');
    }

    public static function toAddressUI()
    {
        self::$user_addresses = self::getUserAddressById();
        self::$view = View::make('shop_template.user_address')
            ->with('user', parent::$user)
            ->withTitle('我的地址');
    }

    public static function toAddressAddUI()
    {
        self::$view = View::make('shop_template.user_address_add')
            ->withTitle('添加信息地址');
    }

    public static function getUserAddressById()
    {
        return S_UserAddress::all()->where('user_id', self::$user->id)->sortByDesc('isdefault');
    }

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

    public static function updateAddress()
    {
        $id = $_REQUEST['id'];
        S_UserAddress::where('user_id',parent::$user->id)->update(['isdefault'=>0]);
        $user_address = S_UserAddress::find($id);
        $user_address->isdefault = 1;
        if ($user_address->save()) {
            echo 1;
        }
        exit;
    }

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