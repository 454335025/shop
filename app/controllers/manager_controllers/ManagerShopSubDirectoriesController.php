<?php

use app\models\S_SubDirectories;
use app\models\S_Directories;

class ManagerShopSubDirectoryController extends ManagerController
{

    /**
     * 跳转商城子目录列表
     */
    public function toShopSubDirectoryUI()
    {
        parent::$view = View::make('manager_template.shop_sub_directory.shop_sub_directory_list')
            ->with('shop_sub_directories', S_SubDirectories::all())
            ->withTitle('商城子目录列表');
    }

    /**
     * 跳转添加商城子目录页面
     */
    public function toShopSubDirectoryAddUI()
    {
        parent::$view = View::make('manager_template.shop_sub_directory.shop_sub_directory_add')
            ->with('shop_directories', S_Directories::all())
            ->withTitle('添加商城子目录');
    }

    /**
     * 跳转修改商城子目录页面
     */
    public static function toShopSubDirectoryUpdateUI()
    {
        $shop_sub_directory_id = $_REQUEST['shop_sub_directory_id'];
        parent::$view = View::make('manager_template.shop_sub_directory.shop_sub_directory_update')
            ->with('shop_sub_directory', S_SubDirectories::find($shop_sub_directory_id))
            ->with('shop_directories', S_Directories::all())
            ->withTitle('修改商城子目录');
    }

    /**
     * 添加商城子目录
     */

    public static function addShopSubDirectory()
    {
        $shop_directory_id = $_REQUEST['shop_directory_id'];
        $name = $_REQUEST['name'];
        $url = $_REQUEST['url'];
        $sort = $_REQUEST['sort'];
        $shop_sub_directory = new S_SubDirectories();
        $shop_sub_directory->directory_id = $shop_directory_id;
        $shop_sub_directory->name = $name;
        $shop_sub_directory->url = $url;
        $shop_sub_directory->sort = $sort;
        if ($shop_sub_directory->save()) {
            echo 1;
            exit;
        }
        echo 2;
        exit;
    }

    /**
     * 修改商城子目录
     */
    public static function updateShopSubDirectory()
    {
        $shop_sub_directory_id = $_REQUEST['shop_sub_directory_id'];
        $shop_directory_id = $_REQUEST['shop_directory_id'];
        $name = $_REQUEST['name'];
        $url = $_REQUEST['url'];
        $sort = $_REQUEST['sort'];
        $shop_sub_directory = S_SubDirectories::find($shop_sub_directory_id);
        $shop_sub_directory->directory_id = $shop_directory_id;
        $shop_sub_directory->name = $name;
        $shop_sub_directory->url = $url;
        $shop_sub_directory->sort = $sort;
        if ($shop_sub_directory->save()) {
            echo 1;
            exit;
        }
        echo 2;
        exit;
    }

    /**
     * 删除商城子目录
     */
    public static function deleteShopSubDirectory()
    {
        $shop_sub_directory_id = $_REQUEST['shop_sub_directory_id'];
        $shop_sub_directory_id = S_SubDirectories::find($shop_sub_directory_id);
        if ($shop_sub_directory_id->delete()) {
            echo 1;
            exit;
        }
        echo 2;
        exit;
    }

}