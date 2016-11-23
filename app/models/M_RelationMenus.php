<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;


class M_RelationMenus extends Model
{

    protected $table = 'm_relation_menus';

    public function belongsToUser()
    {
        return parent::hasOne('app\models\M_Users', 'user_id','id');
    }

    public function belongsToMenu()
    {
        return parent::belongsTo('app\models\M_Menus', 'menu_id','id');
    }

    public function belongsToSubMenu()
    {
        return parent::belongsTo('app\models\M_SubMenus', 'sub_menu_id','id');
    }

}