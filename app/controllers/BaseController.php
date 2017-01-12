<?php

use app\models\S_User;
use app\models\S_ShopCarts;

class BaseController
{
    protected static $view;
    protected static $mail;
    protected static $openid;
    protected static $user;
    protected static $shop_carts;
    protected static $UserInfo;

    public function __construct()
    {
        if (isset($_SESSION['openid'])) {
            self::$openid = $_SESSION['openid'];
            self::$user = S_User::with('hasOneUserType', 'hasManyShopCarts', 'hasOneUserType')->where('openid', self::$openid)->first();
            if (self::verify()) {
                self::$shop_carts = S_ShopCarts::with('belongsToWare')->where('user_id', self::$user->id)->get();
            }else{
                echo "<script>alert('绑定出现问题请稍后再试！');</script>";
                exit;
            }
        } else {
            self::$UserInfo = WxCommonController::OAuth2();
            if (self::$UserInfo['openid'] != '') {
                $_SESSION['openid'] = self::$UserInfo['openid'];
                self::__construct();
            } else {
                echo "<script>alert('未检测到账号2');</script>";
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

    private static function verify()
    {
        if (self::$user->id != '') {
            return password_verify(self::$openid, self::$user->password);
        } else {
            self::$UserInfo = WxCommonController::OAuth2('snsapi_userinfo');
            $password_Hash = password_hash(
                self::$openid,
                PASSWORD_DEFAULT,
                ['cost' => 12]
            );
            $users = new S_User();
            $users->username = self::$UserInfo['nickname'];
            $users->openid = self::$openid;
            $users->password = $password_Hash;
            $users->headimgurl = self::$UserInfo['headimgurl'];
            $users->save();
            return true;
        }
    }
}