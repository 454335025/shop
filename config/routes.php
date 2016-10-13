<?php

use NoahBuscher\Macaw\Macaw;

Macaw::get('/', 'shop_controller/MainController');
//Macaw::get('/', 'HomeController@home');

Macaw::get('/aaa  ', 'shop_controller/MainController');

Macaw::$error_callback = function() {

    throw new Exception("路由无匹配项 404 Not Found");

};

Macaw::dispatch();