<?php

use app\models\User;

class BaseController
{
    protected static $view;
    protected static $mail;
    protected static $openid;
    protected static $user;

    public function __construct()
    {
//        session_start();
        if (isset($_SESSION['openid'])) {
            self::$openid = $_SESSION['openid'];
            if (self::verify()) {
                self::$user = User::where('openid', self::$openid)->first();
            } else {
                echo "<script>alert('未检测到账号');</script>";
            }
        } else {
            self::$openid = !empty($_REQUEST['openid']) ? $_REQUEST['openid'] : '';
            if (self::$openid != '') {
                $_SESSION['openid'] = self::$openid;
                self::__construct();
            } else {
                echo "<script>alert('未检测到账号');</script>";
                exit;
            }

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


    /**
     * @return bool
     * 验证用户登录信息
     */

    public static function verify()
    {
        if (self::$openid) {
            $user = User::where('openid', self::$openid)->first();
            if (!empty($user)) {
                return password_verify(self::$openid, $user->password);
            } else {
                $password_Hash = password_hash(
                    self::$openid,
                    PASSWORD_DEFAULT,
                    ['cost' => 12]
                );
                $users = new User();
                $users->openid = self::$openid;
                $users->password = $password_Hash;
                $users->save();
                return true;
            }
        } else {
            return false;
        }
    }

}