<?php


namespace app\models;

use Illuminate\Database\Eloquent\Model;

class S_Orders extends Model
{

    protected $table = 's_orders';

    public function hasManyOrderDetails()
    {
        return $this->hasMany('app\models\S_OrderDetails','order_id','order_id');
    }

    public function belongsToUserAddress()
    {
        return parent::belongsTo('app\models\S_UserAddress','user_address_id','id');
    }

    public function belongsToUser()
    {
        return parent::belongsTo('app\models\S_User','user_id','id');
    }
}