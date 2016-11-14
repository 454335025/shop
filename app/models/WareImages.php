<?php namespace app\models;

use Illuminate\Database\Eloquent\Model;

class WareImages extends Model
{
    protected $table = 's_wares_images';

    public function belongsToWare()
    {
        return parent::belongsTo('app\models\Ware','ware_id','id');
    }

}