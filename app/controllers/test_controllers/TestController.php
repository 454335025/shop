<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\MailHandler;

class TestController
{

    public function index()
    {
        $a = new Logger('a');
        $b = new Logger('b');

        $a->pushHandler(new StreamHandler('../log/test.log', Logger::WARNING));
        $b->pushHandler(new StreamHandler('../log/test.log', Logger::WARNING));
        $a->addWarning('Foo',array('parameter1'=>'xx1','parameter2'=>'xx2','parameter3'=>'xx3','parameter4'=>'xx4','parameter5'=>'xx5',));
        $a->addError('Bar');
        echo 1;exit;
    }

    public function aa()
    {
        phpinfo();
    }
//    public function index()
//    {
//
//        $password = $_REQUEST['password'];
//        $password_Hash = password_hash(
//            $password,
//            PASSWORD_DEFAULT,
//            ['cost' => 12]
//        );
//        password_verify($password , $password_Hash);
//
//    }

}