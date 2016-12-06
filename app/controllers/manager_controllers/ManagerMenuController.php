<?php

use app\models\M_Menus;

class ManagerMenuController extends ManagerController
{

    /**
     * 跳转父菜单列表
     */
    public function toMenuUI()
    {
        self::$view = View::make('manager_template.common.index')
            ->with('menus', self::getMenuList())
            ->withUi('menu/menu_list');
    }

    /**
     * 跳转添加父菜单页面
     */
    public function toMenuAddUI()
    {
        self::$view = View::make('manager_template.common.index')
            ->withUi('menu/menu_add');
    }

    /**
     * 跳转修改父菜单页面
     */
    public static function toMenuUpdateUI()
    {
        $menu_id = $_REQUEST['menu_id'];
        self::$view = View::make('manager_template.common.index')
            ->with('menus', M_Menus::find($menu_id))
            ->withUi('menu/menu_update');
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
        $menu = M_Menus::find($menu_id);
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
        $menu = M_Menus::find($menu_id);
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

}