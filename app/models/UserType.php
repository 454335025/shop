<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{

    public $timestamps = false;

    public $table = 's_user_types';

    public function belongsToManyUser()
    {
        return parent::belongsToMany('app\models\User','user_type','id');
    }
}