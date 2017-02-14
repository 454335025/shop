<?php


class WxCommonController
{
    private static $oauth;
    private static $code;

    public static function OAuth2($function = null)
    {
        self::$code = !empty($_REQUEST['code']) ? $_REQUEST['code'] : '';//获取code

        self::is_code();

        self::$oauth = call_user_func(array('WxCommonController', 'snsapi_base'));

        if ($function != null && method_exists('WxCommonController', $function)) {
            return call_user_func(array('WxCommonController', $function));
        } else {
            return self::$oauth;
        }
    }

    /**
     * 通过code换取网页授权access_token
     * @return mixed
     */
    private static function snsapi_base()
    {
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . APPID . "&secret=" . SECRET . "&code=" . self::$code . "&grant_type=authorization_code";
        $str = file_get_contents($url);
        return json_decode($str, true);
    }

    /**
     * 获取微信用户信息
     * @return mixed
     */
    private static function snsapi_userinfo()
    {
        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=" . self::$oauth['access_token'] . "&openid=" . self::$oauth['openid'];
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