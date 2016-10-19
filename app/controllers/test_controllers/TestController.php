<?php

/**
 * Created by PhpStorm.
 * User: GE62
 * Date: 2016/10/13
 * Time: 16:08
 */
class TestController
{

    public function index()
    {

        $password = $_REQUEST['password'];
        $password_Hash = password_hash(
            $password,
            PASSWORD_DEFAULT,
            ['cost' => 12]
        );
        password_verify($password , $password_Hash);

    }

}