<?php

use app\models\M_Users;


class ManagerController
{
    protected static $view;
    protected static $mail;
    protected static $user;

    public function __construct()
    {

        if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
            self::$user = M_Users::where('username',$_SESSION['username'])->first();
            $_SESSION['user'] = self::$user;
            if(!empty($_REQUEST['relation_id'])){
                $_SESSION['relation_id'] = $_REQUEST['relation_id'];
            }
        } else {
            self::$view = View::make('manager_template.login');exit;
        }
    }

    public function __destruct()

    {
        $view = self::$view;
        if ($view instanceof View) {
            if (!empty($view->data)) {
                extract($view->data);
            }
            require $view->view;
        }

        $mail = self::$mail;
        if ($mail instanceof Mail) {
            $mailer = new Nette\Mail\SmtpMailer($mail->config);
            $mailer->send($mail);
        }
    }


}