<?php

use app\models\S_Directories;

class ManagerShopDirectoryController extends ManagerController
{

    /**
     * 跳转商城主目录列表
     */
    public function toShopDirectoryUI()
    {

        parent::$view = View::make('manager_template.shop_directory.shop_directory_list')
            ->with('shop_directories', S_Directories::all())
            ->withTitle('商城主目录列表');
    }

    /**
     * 跳转添加商城主目录页面
     */
    public function toShopDirectoryAddUI()
    {
        parent::$view = View::make('manager_template.shop_directory.shop_directory_add')
            ->withTitle('添加商城主目录');
    }

    /**
     * 跳转修改商城主目录页面
     */
    public static function toShopDirectoryUpdateUI()
    {
        $shop_directory_id = $_REQUEST['shop_directory_id'];
        parent::$view = View::make('manager_template.shop_directory.shop_directory_update')
            ->with('shop_directory', S_Directories::find($shop_directory_id))
            ->withTitle('修改商城主目录');
    }

    /**
     * 添加商城主目录
     */

    public static function addShopDirectory()
    {
        $name = $_REQUEST['name'];
        $url = $_REQUEST['url'];
        $sort = $_REQUEST['sort'];
        $shop_directory = new S_Directories();
        $shop_directory->name = $name;
        $shop_directory->url = $url;
        $shop_directory->sort = $sort;
        if ($shop_directory->save()) {
            echo 1;
            exit;
        }
        echo 2;
        exit;
    }

    /**
     * 修改商城主目录
     */
    public static function updateShopDirectory()
    {
        $shop_directory_id = $_REQUEST['shop_directory_id'];
        $name = $_REQUEST['name'];
        $url = $_REQUEST['url'];
        $sort = $_REQUEST['sort'];
        $shop_directory = S_Directories::find($shop_directory_id);
        $shop_directory->name = $name;
        $shop_directory->url = $url;
        $shop_directory->sort = $sort;
        if ($shop_directory->save()) {
            echo 1;
            exit;
        }
        echo 2;
        exit;
    }

    /**
     * 删除商城主目录
     */
    public static function deleteShopDirectory()
    {
        $shop_directory_id = $_REQUEST['shop_directory_id'];
        $shop_directory = S_Directories::find($shop_directory_id);
        if ($shop_directory->delete()) {
            echo 1;
            exit;
        }
        echo 2;
        exit;
    }

}