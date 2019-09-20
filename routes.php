<?php

use App\Controllers\BaseController;
use App\Controllers\EmployeeController;

return [
    "page1" => ["page1", BaseController::class],
    "page2" => ["page2", BaseController::class],
    "" => ["home", BaseController::class],
    "employees" => ["index", EmployeeController::class],
];