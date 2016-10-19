<?php

namespace app\contrllers\wx_controller;
class TestReplyController
{
    function index()
    {
        $time = time();
        $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <FuncFlag>0</FuncFlag>
                        </xml>";
        $msgType = "text";
        if ($contentStr == '') {
            $contentStr = $this->text($keyword);
        }
        return $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
    }

    function text($keyword)
    {
        $text = $this->TextReplyDao->getTextByReplyDao($keyword);
        if (empty($text)) {
            $text = $this->TextReplyDao->getDefaultTextDao();
        }
        return $text['text'];
    }

}