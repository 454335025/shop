<?php
/**
 * Created by PhpStorm.
 * User: GE62
 * Date: 2016/10/18
 * Time: 17:39
 */
namespace app\contrllers\wx_controller;

use app\contrllers\wx_controller\WxController;




class Controller{

    public $WxController;

    public function __construct()
    {
        $this->WxController = new WxController();
    }


}