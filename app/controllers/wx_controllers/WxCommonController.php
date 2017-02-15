<?php


class WxCommonController
{
    private static $code;


    public  function OAuth2($function = null)
    {
        self::$code = !empty($_REQUEST['code']) ? $_REQUEST['code'] : '';//获取code

        self::is_code();

        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . APPID . "&secret=" . SECRET . "&code=" . self::$code . "&grant_type=authorization_code";
        $str = file_get_contents($url);
        if($str){
            $oauth = json_decode($str, true);
            if ($oauth['access_token'] != '' && $function != null && method_exists('WxCommonController', $function)) {
                return call_user_func(array('WxCommonController', $function), $oauth);
            }
        }
    }

    /**
     * 通过code换取网页授权access_token
     * @return mixed
     */
    private static function snsapi_base()
    {

//        return json_decode($str, true);
    }

    /**
     * 获取微信用户信息
     * @return mixed
     */
    private  function snsapi_userinfo($oauth)
    {
        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $oauth['access_token'] . "&openid=" . $oauth['openid'];
        $str = file_get_contents($url);//获取用户信息
        return json_decode($str, true);
    }

    private static function is_code()
    {
        if (self::$code == '') {
            echo "<script>alert('请您用微信服务号访问')</script>";
            exit;
        }
    }


}