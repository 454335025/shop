<?php

namespace app\contrllers\wx_controller;

use app\contrllers\wx_controller\Controller;

class Wx_IndexController extends Controller
{

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
        $requestStr = $GLOBALS["HTTP_RAW_POST_DATA"];//上线放开

        if ($requestStr == '') {
            $requestStr = file_get_contents("php://input");//上线放开
        }

        if (!empty($requestStr)) {
            $postObj = simplexml_load_string($requestStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $msgType = $postObj->MsgType;
            $keyword = trim($postObj->Content);
            $arr = array('fromUsername' => $fromUsername, 'toUsername' => $toUsername, 'msgType' => $msgType, 'keyword' => $keyword, 'postObj' => $postObj);


//            $reqid = $Log->output('req', $requestStr, $postObj);

            $WxController = new WxController($arr);
            $responseStr = $WxController->index();
            //应答报文
//            $Log->output('res', $responseStr, '', $reqid);
            echo $responseStr;
        } else {
            echo '';
            exit;
        }
    }
}

?>