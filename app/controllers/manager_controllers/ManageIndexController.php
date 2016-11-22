<?php

use app\models\M_RelationMenus;

class ManagerIndexController extends ManagerController
{

    public function index()
    {
        foreach (M_RelationMenus::all()->where('user_id',parent::$user->id)->groupBy('menu_id') as $a){

            print_r($a->belongsToSubMenu->name);exit;
        }
        self::$view = View::make('manager_template.common.index')
            ->with('user', parent::$user)
            ->withUi('index');
    }

}