<?php
/**
 * Created by PhpStorm.
 * User: GE62
 * Date: 2016/12/20
 * Time: 18:28
 */




class WxTextReplyController extends WxController
{
    public static function texts()
    {
        self::create_text_xml();
    }

    private static function create_text_xml()
    {
        $xml = WxCreateXmlController::create_text_xml();
        parent::$responseStr = sprintf(
            $xml,
            parent::$fromUsername,
            parent::$toUsername,
            time(),
            self::$reply->text);
    }

}