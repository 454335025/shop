<?php

namespace app\contrllers\wx_controller;

class TestNewsController extends WxController
{
    private $newsArray = array();


    public function index()
    {
        if ($this->contentStr == '') {
            $this->newsArray = $this->TextNewsReplyDao->getTextNewsByReplyDao($this->keyword);
        }

        if (count($this->newsArray) < 1) {
            return $responseStr = $this->text_reply_Controllers->index($fromUsername, $toUsername, $msgType, $keyword, $contentStr);
        }
        $itemTpl = "    <item>
        <Title><![CDATA[%s]]></Title>
        <Description><![CDATA[%s]]></Description>
        <PicUrl><![CDATA[%s]]></PicUrl>
        <Url><![CDATA[%s]]></Url>
        </item>";
        $item_str = "";
        foreach ($newsArray as $item) {
            $item_str .= sprintf($itemTpl, $item['title'], $item['description'], $item['picurl'], $item['url']);
        }
        $newsTpl = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[news]]></MsgType>
            <Content><![CDATA[]]></Content>
            <ArticleCount>%s</ArticleCount>
            <Articles>
            $item_str</Articles>
            </xml>";
        return $responseStr = sprintf($newsTpl, $fromUsername, $toUsername, time(), count($newsArray));

    }


}