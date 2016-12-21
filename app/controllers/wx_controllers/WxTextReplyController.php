<?php
/**
 * Created by PhpStorm.
 * User: GE62
 * Date: 2016/12/20
 * Time: 18:28
 */

namespace app\contrllers\wx_controller;


class WxTextReplyController extends WxController
{
    public function index()
    {
        self::create_text_xml();
    }

    private static function create_text_xml()
    {
        $xml = parent::$WxCreateXmlController->create_text_xml();
        parent::$responseStr = sprintf(
            $xml,
            parent::$fromUsername,
            parent::$toUsername,
            time(),
            self::$reply->text);
    }

}