<?php

use app\models\M_RelationMenus;

class ManagerRelationMenuController extends ManagerController
{

    public static function toRelationMenuUI()
    {
        parent::$view = View::make('manager_template.common.index')
            ->with('user', parent::$user)
            ->with('relation_menus', self::getRelation())
            ->withTitle('菜单权限列表')
            ->withUi('relation_menu/relation_menu_list');

    }

    public static function getRelation()
    {
        return M_RelationMenus::all()->where('user_id', parent::$user->id);
    }

}