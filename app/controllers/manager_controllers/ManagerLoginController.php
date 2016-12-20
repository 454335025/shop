<?php
use app\models\M_Users;

class ManagerLoginController
{
    private static $username = '';
    private static $password = '';

    public function __construct()
    {
        self::$username = !empty($_REQUEST['username']) ? $_REQUEST['username'] : '';
        self::$password = !empty($_REQUEST['password']) ? $_REQUEST['password'] : '';
    }

    public static function index()
    {
        if (self::verify()) {
            $_SESSION['username'] = self::$username;
            echo 1;
        } else {
            echo 0;
        }
        exit;
    }

    protected static function getUserByUsernameAndPassword()
    {
        return M_Users::where('username', self::$username)
            ->first();
    }

    protected static function verify()
    {
        $user = self::getUserByUsernameAndPassword();
        if (!empty($user)) {
            return password_verify(self::$password, $user->password);
        } else {
            return false;
        }
    }

    public static function loginout()
    {
        $_SESSION['username'] = '';
        echo 1;exit;
    }

}