<?php


class WxCommonController
{
//    private static $oauth;
//    private static $code;

//    public static function OAuth2($function = null)
//    {
//        self::$code = !empty($_REQUEST['code']) ? $_REQUEST['code'] : '';//获取code
//        self::is_code();
//        self::$oauth = call_user_func(array('WxCommonController', 'snsapi_base'));
//
//        if ($function != null && method_exists('WxCommonController', $function)) {
//            self::$oauth = isset(self::$oauth) ? self::$oauth : null;
//            if (is_null(self::$oauth)) die('Token ID is not set');
//            return call_user_func(array('WxCommonController', $function));
//        } else {
//            return self::$oauth;
//        }
//    }
//    /**
//     * 通过code换取网页授权access_token
//     * @return mixed
//     */
//    private static function snsapi_base()
//    {
//        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . APPID . "&secret=" . SECRET . "&code=" . self::$code . "&grant_type=authorization_code";
//        $str = file_get_contents($url);
//        if (empty($str)) die('Failed to fetch data');
//        $data = json_decode($str, true);
//        if (is_null($data) || $data === false) die('Failed to decode data');
//        return $data;
//    }
//    /**
//     * 获取微信用户信息
//     * @return mixed
//     */
//    private static function snsapi_userinfo()
//    {
//        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=" . self::$oauth['access_token'] . "&openid=" . self::$oauth['openid'];
//        $str = file_get_contents($url);//获取用户信息
//        return json_decode($str, true);
//    }
//
//    private static function is_code()
//    {
//        if(self::$code == ''){
//            echo "<script>alert('请您用微信服务号访问')</script>";exit;
//        }
//    }

    function aa(){
        $myfile = fopen(__DIR__."/log/".date('Ymd',time()).".log", "a+") or die("Unable to open file!");
        fwrite($myfile, date("Y-m-d H:i:s"). ":1:  \r\n");

        $code = !empty($_REQUEST['code']) ? $_REQUEST['code'] : '';//获取code
        fwrite($myfile, date("Y-m-d H:i:s"). ":2: $code \r\n");
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . APPID . "&secret=" . SECRET . "&code=" . $code . "&grant_type=authorization_code";
        fwrite($myfile, date("Y-m-d H:i:s"). ":3: $url \r\n");
        $str = file_get_contents($url);
        fwrite($myfile, date("Y-m-d H:i:s"). ":4:  \r\n");
        $oauth = json_decode($str, true);
        fwrite($myfile, date("Y-m-d H:i:s"). ":5: $oauth[access_token] \r\n");

        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $oauth['access_token'] . "&openid=" . $oauth['openid'];
        fwrite($myfile, date("Y-m-d H:i:s"). ":6: $url \r\n");
        $str = file_get_contents($url);//获取用户信息
        fclose($myfile);
        return json_decode($str, true);
    }


}