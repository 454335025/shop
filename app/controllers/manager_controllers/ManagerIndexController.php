<?php

class ManagerIndexController extends ManagerController
{

    public function index()
    {
        parent::$view = View::make('manager_template.index')
            ->with('user', parent::$user)
            ->withTitle('main');
    }

}