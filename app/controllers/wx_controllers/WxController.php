<?php

use app\models\W_TextReply;

class WxController extends WxIndexController
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


    protected static $WxCreateXmlController;


    protected static $reply;

    /**
     * 返回值
     */
//    protected static $responseStr = '';
//    protected static $contentStr = '';


    public function __construct()
    {
        self::$WxCreateXmlController = new WxCreateXmlController();

        self::$fromUsername = parent::$postObj->FromUserName;
        self::$toUsername = parent::$postObj->ToUserName;
        self::$toUsername = parent::$postObj->MsgType;
        self::$keyword = trim(parent::$postObj->Content);

        self::$postObj = parent::$postObj;
        self::$event = parent::$postObj->Event;
        self::$eventkey = parent::$postObj->EventKey;


    }

    public static function routes()
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
    }

    /**
     * 文本
     */
    public function text()
    {
        self::$reply = W_TextReply::where('reply', self::$keyword)->get();
        switch (self::$reply->type) {
            case 'text':
                WxTextReplyController::text();
                break;
            case 'new':
                WxTextNewController::news();
                break;
            case 'type3':
                ;
                break;
        }
    }

    /**
     * 事件
     */
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

    /**
     * 按钮点击事件
     */
    public function click()
    {
        if (strpos(self::$eventkey, 'other')) {
            switch (self::$eventkey) {
                //绑定按钮
                case 'toMain':
                    ;
                    break;
            }
        } else {
            $redirect_uri = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . APPID . "&redirect_uri=" . self::$eventkey . "&response_type=code&scope=snsapi_userinfo#wechat_redirect";
            header("Location:$redirect_uri");
            exit;
        }
    }


}