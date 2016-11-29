<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class S_OrderDetails extends Model
{
    protected $table = 's_order_details';

    public function belongsToWare()
    {
        return parent::belongsTo('app\models\S_Ware','ware_id','id');
    }


}