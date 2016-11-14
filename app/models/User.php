<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{

    protected $table = 's_users';

    public function hasOneUserType()
    {
        return $this->hasOne('app\models\UserType','id','user_type');
    }


}