<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{

    protected $table = "s_user_address";

    public static function belongsToUserAddress()
    {
        return parent::belongsTo('app\models\UserAddress','id','user_id');


    }

}