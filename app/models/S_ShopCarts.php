<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class S_ShopCarts extends Model
{
    protected $table = 's_shop_carts';

    public function belongsToWare()
    {
        return parent::belongsTo('app\models\S_Ware','ware_id','id');
    }

}