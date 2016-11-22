<?php
namespace app\models;

use Illuminate\Database\Eloquent\Model;

class M_SubMenus extends Model
{

    protected $table = 'm_sub_menus';

    public function belongsToMenus()
    {
        return parent::belongsTo('app\models\M_Menus', 'menu_id', 'id');
    }


}