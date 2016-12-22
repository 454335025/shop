<?php

use app\contrllers\wx_controllers\WxController;

class WxIndexController
{
    protected static $postObj;
    protected static $requestStr;
    protected static $responseStr;
    public function index()
    {

        if (isset($_GET['echostr'])) {

            self::valid();
        } else {

            self::responseMsg();
        }
    }

    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if (self::checkSignature()) {
            echo $echoStr;
            exit;
        }
    }

    private function checkSignature()
    {

        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }

    public function responseMsg()
    {

//        $requestStr = $_REQUEST['mpxml'];  //线下测试放开
        self::$requestStr = $GLOBALS["HTTP_RAW_POST_DATA"];//上线放开
        if (self::$requestStr == '') {
            self::$requestStr = file_get_contents("php://input");//上线放开
        }

        if (!empty(self::$requestStr)) {
            self::$postObj = simplexml_load_string(self::$requestStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            WxController::index();
            echo self::$responseStr;
        } else {
            echo '';
            exit;
        }
    }


}

?>