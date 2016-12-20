<?php

namespace app\contrllers\wx_controller;


use app\models\WxTestReply;

class WxController
{
    /**
     * 变量
     */
    protected static $fromUsername;
    protected static $toUsername;
    protected static $msgType;
    protected static $keyword;
    protected static $postObj;
    protected static $event;
    protected static $eventkey;

    /**
     * 返回值
     */
    protected static $responseStr = '';
    protected static $contentStr = '';


    public function __construct($arr)
    {
        self::$fromUsername = $arr['fromUsername'];
        self::$toUsername = $arr['toUsername'];
        self::$msgType = $arr['msgType'];
        self::$keyword = $arr['keyword'];

        self::$postObj = $arr['postObj'];
        self::$event = self::$postObj->Event;
        self::$eventkey = self::$postObj->EventKey;

    }

    public function index()
    {
        switch (self::$msgType) {
            case 'text':
                self::text();
                break;
            case 'event':
                self::event();
                break;
            default :
                self::text();
                break;

        }
        return self::$responseStr;
    }

    public function text()
    {
    }

    public function event()
    {
        switch (self::$event) {
            //取消关注
            case 'unsubscribe':
                ;
                break;
            //关注
            case 'subscribe':
                ;
                break;
            //点击菜单
            case 'CLICK':
                self::click();
                break;

        }
    }

    public function click()
    {
        switch (self::$eventkey) {
            //绑定按钮
            case 'bind':
                ;
                break;
        }

    }


}