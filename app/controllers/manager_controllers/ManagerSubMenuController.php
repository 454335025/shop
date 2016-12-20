<?php

use app\models\M_SubMenus;

class ManagerSubMenuController extends ManagerController
{
    /**
     * 跳转父菜单列表
     */
    public function toSubMenuUI()
    {
        self::$view = View::make('manager_template.common.index')
            ->with('sub_menus', self::getSubMenuList())
            ->withTitle('子菜单列表')
            ->withUi('sub_menu/sub_menu_list');
    }

    /**
     * 跳转添加父菜单页面
     */
    public function toSubMenuAddUI()
    {
        self::$view = View::make('manager_template.common.index')
            ->withTitle('添加子菜单')
            ->withUi('sub_menu/sub_menu_add');
    }

    /**
     * 跳转修改子菜单页面
     */
    public static function toSubMenuUpdateUI()
    {
        $sub_menu_id = $_REQUEST['sub_menu_id'];
        self::$view = View::make('manager_template.common.index')
            ->with('sub_menus', M_SubMenus::find($sub_menu_id))
            ->withTitle('修改子菜单')
            ->withUi('sub_menu/sub_menu_update');
    }

    /**
     * 添加子菜单
     */

    public static function addSubMenu()
    {
        $menu_id = $_REQUEST['menu_id'];
        $name = $_REQUEST['name'];
        $url = $_REQUEST['url'];
        $sort = $_REQUEST['sort'];
        $sub_menu = new M_SubMenus();
        $sub_menu->menu_id = $menu_id;
        $sub_menu->name = $name;
        $sub_menu->url = $url;
        $sub_menu->sort = $sort;
        if ($sub_menu->save()) {
            echo 1;
            exit;
        }
        echo 2;
        exit;
    }

    /**
     * 修改子菜单
     */
    public static function updateSubMenu()
    {
        $sub_menu_id = $_REQUEST['sub_menu_id'];
        $menu_id = $_REQUEST['menu_id'];
        $name = $_REQUEST['name'];
        $url = $_REQUEST['url'];
        $sort = $_REQUEST['sort'];
        $sub_menu = M_SubMenus::find($sub_menu_id);
        $sub_menu->menu_id = $menu_id;
        $sub_menu->name = $name;
        $sub_menu->url = $url;
        $sub_menu->sort = $sort;
        if ($sub_menu->save()) {
            echo 1;
            exit;
        }
        echo 2;
        exit;
    }

    /**
     * 删除子菜单
     */
    public static function deleteSubMenu()
    {
        $sub_menu_id = $_REQUEST['sub_menu_id'];
        $sub_menu = M_SubMenus::find($sub_menu_id);
        if ($sub_menu->delete()) {
            echo 1;
            exit;
        }
        echo 2;
        exit;
    }

    /**
     * 获取子菜单信息
     */
    public static function getSubMenuList()
    {
        return M_SubMenus::all();
    }

}