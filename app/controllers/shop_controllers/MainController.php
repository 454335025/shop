<?php

/**
 * Created by PhpStorm.
 * User: GE62
 * Date: 2016/10/13
 * Time: 12:08
 */
class MainController extends BaseController
{

    public function index()
    {
        $this->view = View::make('shop_template.main1');
    }


}