<?php

use app\models\M_RelationMenus;
use app\models\M_SubMenus;
use app\models\M_Users;

class ManagerRelationMenuController extends ManagerController
{

    public static function toRelationMenuUI()
    {
        parent::$view = View::make('manager_template.relation_menu.relation_menu_list')
            ->with('relation_menus', M_RelationMenus::all())
            ->withTitle('菜单权限列表');

    }

    public static function toRelationMenuAddUI()
    {
        parent::$view = View::make('manager_template.relation_menu.relation_menu_add')
            ->with('sub_menus', M_SubMenus::all())
            ->with('users', M_Users::all())
            ->withTitle('添加权限');
    }

    public static function toRelationMenuUpdateUI()
    {
        $relation_menu_id = $_REQUEST['relation_menu_id'];
        parent::$view = View::make('manager_template.relation_menu.relation_menu_update')
            ->with('relation_menu', M_RelationMenus::find($relation_menu_id))
            ->with('sub_menus', M_SubMenus::all())
            ->with('users', M_Users::all())
            ->withTitle('修改权限');
    }

    public static function addRelationMenu()
    {
        $user_id = $_REQUEST['user_id'];
        $menu_id = $_REQUEST['menu_id'];
        $sub_menu_id = $_REQUEST['sub_menu_id'];
        $relation_menu = new M_RelationMenus();
        $relation_menu->user_id = $user_id;
        $relation_menu->menu_id = $menu_id;
        $relation_menu->sub_menu_id = $sub_menu_id;
        if ($relation_menu->save()) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }

    }

    public static function updateRelationMenu()
    {
        $relation_menu_id = $_REQUEST['relation_menu_id'];
        $user_id = $_REQUEST['user_id'];
        $menu_id = $_REQUEST['menu_id'];
        $sub_menu_id = $_REQUEST['sub_menu_id'];
        $relation_menu = M_RelationMenus::find($relation_menu_id);
        $relation_menu->user_id = $user_id;
        $relation_menu->menu_id = $menu_id;
        $relation_menu->sub_menu_id = $sub_menu_id;
        if ($relation_menu->save()) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }

    public static function deleteRelationMenu()
    {
        $relation_menu_id = $_REQUEST['relation_menu_id'];
        $relation_menu = M_RelationMenus::find($relation_menu_id);
        if ($relation_menu->delete()) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }

}