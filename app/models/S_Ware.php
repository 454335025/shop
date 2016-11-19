<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class S_Ware extends Model
{
    protected $table = 's_wares';

    public function hasOneShopCar()
    {
        return parent::hasOne('app\models\S_ShopCarts', 'ware_id', 'id');
    }

    public function hasManyWareImages()
    {
        return parent::hasMany('app\models\S_WareImages', 'ware_id', 'id');
    }

}