<?php

class ManagerIndexController extends ManagerController
{

    public function index()
    {
        self::$view = View::make('manager_template.common.index')
            ->withUi('index');
    }

}