<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class S_SubDirectories extends Model
{
    protected $table = 's_sub_directories';

    public function belongsToDirectories()
    {
        return parent::belongsTo('app\models\S_Directories','directory_id','id');
    }


}