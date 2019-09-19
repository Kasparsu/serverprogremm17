<?php

use App\Cat;
use App\DB;
use App\DI;
use App\Router;
require('../app/helpers.php');
spl_autoload_register(function($class) {
    
    $class = explode('\\', $class);
    for($i=0; $i<count($class)-1; $i++){
        $class[$i] = strtolower($class[$i]);
    }
    require_once(__DIR__ . '/../' . implode('/', $class) . '.php');
});
DI::$router = new Router($_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"], "/");
DI::$router->match();
DI::$DB = new DB('database', 'root', 'secret', 'homestead');
