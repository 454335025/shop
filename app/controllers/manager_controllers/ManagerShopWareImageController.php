<?php

use app\models\S_WareImages;

class ManagerShopWareImageController extends ManagerController
{

    public function toShopWareImageUI()
    {
        $shop_ware_id = $_REQUEST['shop_ware_id'];
        parent::$view = MView::make('manager_template.shop_ware_image.shop_ware_image_list')
            ->with('shop_ware_images', S_WareImages::where('ware_id', $shop_ware_id)->get())
            ->with('shop_ware_id', $shop_ware_id)
            ->withTitle('商品详情图片列表');
    }

    public static function toShopWareImageAddUI()
    {
        $shop_ware_id = $_REQUEST['shop_ware_id'];
        parent::$view = View::make('manager_template.shop_ware_image.shop_ware_image_add')
            ->with('shop_ware_id', $shop_ware_id)
            ->withTitle('添加商品详情图片');
    }

    public static function toShopWareImageUpdateUI()
    {
        $shop_ware_id = $_REQUEST['shop_ware_id'];
        $shop_ware_image_id = $_REQUEST['shop_ware_image_id'];
        parent::$view = View::make('manager_template.shop_ware_image.shop_ware_image_update')
            ->with('shop_ware_image', S_WareImages::find($shop_ware_image_id))
            ->with('shop_ware_id', $shop_ware_id)
            ->withTitle('修改商品详情图片');
    }

    public static function addShopWareImage()
    {
        $shop_ware_id = $_REQUEST['shop_ware_id'];
        $sort = $_REQUEST['sort'];

        $file = $_FILES['image'];

        $shop_ware_image = new S_WareImages();
        $shop_ware_image->ware_id = $shop_ware_id;
        $shop_ware_image->sort = $sort;

        if ($shop_ware_image->save() && $file && $file['size'] != 0) {
            $upload_url = "images/shop/ware/detail_list/ware_list_" . $shop_ware_id . "_" . $shop_ware_image->id."." . explode('.', $file['name'])[1];
            move_uploaded_file($file["tmp_name"], $upload_url);
            $upload_url = '/' . $upload_url;
            $shop_ware_image->image = $upload_url;
            if ($shop_ware_image->save()) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        } else {
            echo 0;
            exit;
        }

    }

    public static function updateShopWareImage()
    {
        $shop_ware_image_id = $_REQUEST['shop_ware_image_id'];
        $sort = $_REQUEST['sort'];

        $file = !empty($_FILES['image']) ? $_FILES['image'] : '';

        if ($file && $file['size'] != 0) {
            $shop_ware_image = S_WareImages::find($shop_ware_image_id);
            $shop_ware_image->sort = $sort;

            $upload_url = "images/shop/ware/detail_list/ware_list_" . $shop_ware_image->ware_id . "_" . $shop_ware_image_id .".". explode('.', $file['name'])[1];
            move_uploaded_file($file["tmp_name"], $upload_url);
            $upload_url = '/' . $upload_url;

            $shop_ware_image->image = $upload_url;
            if ($shop_ware_image->save()) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        } else {
            echo 0;
            exit;
        }
    }

    /**
     * 删除商品
     */
    public static function deleteShopWareImage()
    {
        $shop_ware_image_id = $_REQUEST['shop_ware_image_id'];
        $shop_ware_image = S_WareImages::find($shop_ware_image_id);
        if ($shop_ware_image->delete()) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }

}