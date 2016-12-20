<?php

class ManagerIndexController extends ManagerController
{

    public function index()
    {
        parent::$view = View::make('manager_template.common.index')
            ->with('user', parent::$user)
            ->withTitle('main')
            ->withUi('index');
    }

}