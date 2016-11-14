<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class Directories extends Model
{
    protected $table = 's_directories';

    public function hasManySubDirectories()
    {
        return parent::hasMany('app\models\SubDirectories', 'directory_id', 'id');
    }


}