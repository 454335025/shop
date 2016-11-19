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

    public function hasManyUserAddress()
    {
        return $this->hasMany('app\models\S_UserAddress','user_id','id');
    }


}