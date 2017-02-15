<?php


class WxCommonController
{
    private static $oauth;
    private static $code;

    public function __construct()
    {
        $myfile = fopen(__DIR__."/log/".date('Ymd',time()).".log", "a+") or die("Unable to open file!");
        fwrite($myfile, date("Y-m-d H:i:s"). ": 1 \r\n");

        self::$code = !empty($_REQUEST['code']) ? $_REQUEST['code'] : '';//获取code
        self::is_code();
        fwrite($myfile, date("Y-m-d H:i:s"). ":2code: ".self::$code." \r\n");
        self::$oauth = self::snsapi_base();
        fwrite($myfile, date("Y-m-d H:i:s"). ":3access_token: ".self::$oauth['access_token']." \r\n");
        fclose($myfile);
    }

    /**
     * 通过code换取网页授权access_token
     * @return mixed
     */
    private static function snsapi_base()
    {
        $myfile = fopen(__DIR__."/log/".date('Ymd',time()).".log", "a+") or die("Unable to open file!");
        fwrite($myfile, date("Y-m-d H:i:s"). ": 4 \r\n");
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . APPID . "&secret=" . SECRET . "&code=" . self::$code . "&grant_type=authorization_code";
        $str = file_get_contents($url);
        fwrite($myfile, date("Y-m-d H:i:s"). ": 5 \r\n");
        fclose($myfile);
        return json_decode($str, true);
    }

    /**
     * 获取微信用户信息
     * @return mixed
     */
    public static function snsapi_userinfo()
    {
        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=" . self::$oauth["access_token"] . "&openid=" . self::$oauth['openid'];
        $str = file_get_contents($url);//获取用户信息
        return json_decode($str, true);
    }

    private static function is_code()
    {
        if(self::$code == ''){
            echo "<script>alert('请您用微信服务号访问')</script>";exit;
        }
    }


}