<?php


class WxCommonController
{
    private static $oauth;

    public static function OAuth2($function = null)
    {
        if ($function != null && function_exists('getUserInfo')) {
            $code = $_GET["code"];//获取code
            $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . APPID . "&secret" . SECRET . "&code=$code&grant_type=authorization_code";//通过code换取网页授权access_token
            $str = file_get_contents($url);
            self::$oauth = json_decode($str, true);
            return call_user_func($function);
        } else {
            echo "未找到方法";exit;
        }
    }

    public static function getUserInfo()
    {
        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=" . self::$oauth['access_token'] . "&openid=" . self::$oauth['openid'];
        $str = file_get_contents($url);//获取用户信息
        return json_decode($str, true);
    }


}