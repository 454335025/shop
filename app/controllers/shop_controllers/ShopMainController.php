<?php

use app\models\User;
use app\models\Directories;
use app\models\SubDirectories;
use app\models\Ware;

class ShopMainController extends BaseController
{
    public static $openid;

    public function index()
    {
        self::$openid = $_REQUEST['openid'];

        if (self::verify()) {
            $directories = self::getDirectories();
            $wares = self::getWares();

            $this->view = View::make('shop_template.main')
                ->with('directories', $directories)
                ->with('wares', $wares);
        }


    }


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

    public static function getDirectories()
    {
        $directories = Directories::all()->sortBy('sort');
        foreach ($directories as $directory) {
            $directory->sub_directories = SubDirectories::all()->where('directory_id', $directory->id)->sortBy('sort');
        }
        return $directories;
    }

    public static function getWares()
    {
        return Ware::all()->sortBy('sort');

    }
}