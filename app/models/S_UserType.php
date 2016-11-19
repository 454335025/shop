<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class S_UserType extends Model
{

    public $timestamps = false;

    public $table = 's_user_types';

    public function belongsToManyUser()
    {
        return parent::belongsToMany('app\models\S_User','user_type','id');
    }
}