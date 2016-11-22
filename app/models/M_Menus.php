<?php
namespace app\models;

use Illuminate\Database\Eloquent\Model;

class M_Menus extends Model
{

    protected $table = 'm_menus';

    public function hasManySubMenus()
    {
        return parent::hasMany('app\models\M_SubMenus', 'menu_id', 'id');
    }

}