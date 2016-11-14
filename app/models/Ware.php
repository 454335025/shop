<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class Ware extends Model
{
    protected $table = 's_wares';

    public function hasOneShopCar()
    {
        return parent::hasOne('app\models\ShopCarts', 'ware_id', 'id');
    }

    public function hasManyWareImages()
    {
        return parent::hasMany('app\models\WareImages', 'ware_id', 'id');
    }

}