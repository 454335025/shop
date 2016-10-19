<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;


class Log
{
    private $FileUrl = BASE_PATH . "/log/";

    public function setFileLog($filename)
    {
        // create a log channel
        $fileName = $this->FileUrl . $filename . date("Ymd", time());

        $log = new Logger('WriteLog');

        $log->pushHandler(new StreamHandler($fileName, Logger::DEBUG));
        $log->pushHandler(new StreamHandler($fileName, Logger::INFO));
        $log->pushHandler(new StreamHandler($fileName, Logger::WARNING));
        $log->pushHandler(new StreamHandler($fileName, Logger::ERROR));
        $log->pushHandler(new StreamHandler($fileName, Logger::CRITICAL));
        $log->pushHandler(new StreamHandler($fileName, Logger::ALERT));

        // add records to the log
        $log->addInfo('Foo');
    }

}