<?php


class WxCommonController
{
    private static $oauth;
    private static $code;
    private static $url;

    public static function OAuth2($function = array())
    {
        if (count($function) == 0 && method_exists('WxCommonController', $function)) {
            self::$code = $_GET["code"];//获取code
            self::$url = $_GET["state"];//获取url
            foreach ($function as $value) {
                $function_array = call_user_func(array('WxCommonController', $value));
            }
            return end($function_array);
        } else {
            echo "未找到方法";
            exit;
        }
    }

    function getUserInfo()
    {
        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=" . self::$oauth['access_token'] . "&openid=" . self::$oauth['openid'];
        $str = file_get_contents($url);//获取用户信息
        $str = json_decode($str, true);
        if (array_key_exists('errcode', $str) && $str['errcode'] == '48001') {
            self::snsapi_userinfo();
        }
        return $str;
    }

    function snsapi_base()
    {
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . APPID . "&secret=" . SECRET . "&code=" . self::$code . "&grant_type=authorization_code";//通过code换取网页授权access_token
        $str = file_get_contents($url);
        return json_decode($str, true);
    }

    function snsapi_userinfo()
    {
        if (isset(self::$url)) {
            $redirect_uri = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxd98c74d2183c3a4e&redirect_uri=" . self::$url . "&response_type=code&scope=snsapi_userinfo&state=" . self::$url . "#wechat_redirect";
            header("Location:$redirect_uri");
            exit;
        }
    }


}