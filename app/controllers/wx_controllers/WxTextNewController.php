<?php
/**
 * Created by PhpStorm.
 * User: GE62
 * Date: 2016/12/20
 * Time: 18:28
 */

namespace app\contrllers\wx_controller;

use app\models\W_TextNew;

class WxTextNewController extends WxController
{
    private static $news;
    public static function index()
    {
        self::$news = W_TextNew::where('text_id',parent::$reply->reply)->get();
        self::create_reply_xml();
    }

    private static function create_reply_xml()
    {
        $count = 0;
        $item_str = '';

        $itemTpl = WxCreateXmlController::create_new_item_xml();
        foreach (self::$news as $new) {
            $item_str .= sprintf($itemTpl, $new->title, $new->description, $new->picurl, $new->url);
            $count++;
        }

        $newsTpl = WxCreateXmlController::create_new_xml();

        parent::$responseStr = sprintf($newsTpl, parent::$fromUsername, parent::$toUsername, time(), $count, $item_str);
    }
}