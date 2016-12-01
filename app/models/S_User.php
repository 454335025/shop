<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;


class S_User extends Model
{

    protected $table = 's_users';

    public function hasOneUserType()
    {
        return $this->hasOne('app\models\S_UserType','id','user_type');
    }

    public function hasManyUserAddresses()
    {
        return $this->hasMany('app\models\S_UserAddress','user_id','id');
    }

    public function hasManyShopCarts()
    {
        return $this->hasMany('app\models\S_ShopCarts','user_id','id');
    }

    public function hasManyOrders()
    {
        return $this->hasMany('app\models\S_Orders','user_id','id');
    }


}