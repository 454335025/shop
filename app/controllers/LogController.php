<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/10/21
 * Time: 10:24
 * 日志模块
 */
date_default_timezone_set("Asia/Shanghai");

class LogController
{
    private static $LOG_TARGET = "FILE"; // 支持 FILE, ECHO
    private $con;

    /**
     * 记录日志
     * @param $type             日志类型
     * @param $output           报文字符串
     * @param string $postObj   解析后报文
     * @param string $reqid     请求报文id
     * @return bool
     */
    function output($type, $output, $postObj = '', $reqid = '')
    {
        $filepath = dirname(__FILE__) . '/log/';
        if ($type == 'info') {
            $this->info($filepath, $output);
        } else if ($type == 'req') {
            $id = $this->addLogReqStr($output, $postObj);
            $this->info($filepath, $output);
            return $id;
        } else if ($type == 'res') {
            $this->addLogResStr($output, $reqid);
            $this->info($filepath, $output);
        } else {
            $this->error($filepath, $output);
        }
    }


    /**
     * 日志表插入请求报文
     * @param $xml      请求报文字符串
     * @param $postObj  解析后请求报文
     * @return bool
     */
    function addLogReqStr($xml, $postObj)
    {
        $openid = $postObj->FromUserName;
        $msgtype = $postObj->MsgType;
        $keyword = trim($postObj->Content);
        $msgid = $postObj->MsgId;
        $time = time();
        $sql = "INSERT INTO pre_wx_log_reqstr (openid,xml,msgtype,keyword,msgid,dateline) VALUES (?,?,?,?,?,?)";
        $sth = $this->con->prepare($sql);
        $sth->bindParam(1, $openid, PDO::PARAM_STR);
        $sth->bindParam(2, $xml, PDO::PARAM_STR);
        $sth->bindParam(3, $msgtype, PDO::PARAM_STR);
        $sth->bindParam(4, $keyword, PDO::PARAM_STR);
        $sth->bindParam(5, $msgid, PDO::PARAM_STR);
        $sth->bindParam(6, $time, PDO::PARAM_STR);
        if ($sth->execute()) {
            $reqid = $this->con->lastInsertId();
            return $reqid;
        } else {
            var_dump($sth->errorInfo());
            return false;
        }
    }

    /**
     * 日志表插入应答报文
     * @param $xml      应答报文字符串
     * @param $reqid    请求报文id
     * @return bool
     */
    function addLogResStr($xml, $reqid)
    {
        $time = time();
        $sql = "INSERT INTO pre_wx_log_resstr (reqid,xml,dateline) VALUES (?,?,?)";
        $sth = $this->con->prepare($sql);
        $sth->bindParam(1, $reqid, PDO::PARAM_INT);
        $sth->bindParam(2, $xml, PDO::PARAM_STR);
        $sth->bindParam(3, $time, PDO::PARAM_STR);
        if ($sth->execute()) {
            return true;
        } else {
            var_dump($sth->errorInfo());
            return false;
        }
    }


    /*
     * 信息
     */
    function info($filepath, $message)
    {
        if ("FILE" == self::$LOG_TARGET) {
            $file = $filepath . date("Ymd") . ".log";
            $data = date("Y-m-d H:i:s") . " [INFO] " . $message . "\r\n";
            $path = $filepath;
            if (!is_dir($path)) {
                mkdir($path);
            }
            file_put_contents($file, $data, FILE_APPEND);
        }
    }

    /*
     * 错误
     */
    function error($filepath, $message)
    {
        if ("FILE" == self::$LOG_TARGET) {
            $file = $filepath . date("Ymd") . ".log";
            $data = date("Y-m-d H:i:s") . " [ERROR] " . $message . "\r\n";
            file_put_contents($file, $data, FILE_APPEND);
        }
    }


}