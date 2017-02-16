<?php

use app\models\M_Menus;

class ManagerMenuController extends ManagerController
{

    /**
     * 跳转父菜单列表
     */
    public function toMenuUI()
    {
        parent::$view = View::make('manager_template.menu.menu_list')
            ->with('menus', self::getMenuList())
            ->withTitle('父菜单列表');
    }

    /**
     * 跳转添加父菜单页面
     */
    public function toMenuAddUI()
    {
        parent::$view = View::make('manager_template.menu.menu_add')
            ->withTitle('添加父菜单');
    }

    /**
     * 跳转修改父菜单页面
     */
    public static function toMenuUpdateUI()
    {
        $menu_id = $_REQUEST['menu_id'];
        parent::$view = View::make('manager_template.menu.menu_update')
            ->with('menu', self::getMenuListById($menu_id))
            ->withTitle('修改父菜单');
    }

    /**
     * 添加父菜单
     */

    public static function addMenu()
    {
        $name = $_REQUEST['name'];
        $sort = $_REQUEST['sort'];
        $menu = new M_Menus();
        $menu->name = $name;
        $menu->sort = $sort;
        if ($menu->save()) {
            echo 1;
            exit;
        }
        echo 2;
        exit;
    }

    /**
     * 修改父菜单
     */
    public static function updateMenu()
    {
        $menu_id = $_REQUEST['menu_id'];
        $name = $_REQUEST['name'];
        $sort = $_REQUEST['sort'];
        $menu = self::getMenuListById($menu_id);
        $menu->name = $name;
        $menu->sort = $sort;
        if ($menu->save()) {
            echo 1;
            exit;
        }
        echo 2;
        exit;
    }

    /**
     * 删除父菜单
     */
    public static function deleteMenu()
    {
        $menu_id = $_REQUEST['menu_id'];
        $menu = self::getMenuListById($menu_id);
        if ($menu->delete()) {
            echo 1;
            exit;
        }
        echo 2;
        exit;
    }

    /**
     * 获取父菜单信息
     */
    public static function getMenuList()
    {
        return M_Menus::all();
    }
    /**
     * 获取父菜单信息通过id
     */
    public static function getMenuListById($menu_id)
    {
        return M_Menus::find($menu_id);
    }
}