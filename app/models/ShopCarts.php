<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class ShopCarts extends Model
{
    protected $table = 's_shop_carts';

    public function belongsToWare()
    {
        return parent::belongsTo('app\models\Ware','ware_id','id');
    }

}