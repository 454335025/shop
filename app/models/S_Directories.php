<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class S_Directories extends Model
{
    protected $table = 's_directories';

    public function hasManySubDirectories()
    {
        return parent::hasMany('app\models\S_SubDirectories', 'directory_id', 'id');
    }


}