<?php

use App\Controllers\BaseController;
use App\Controllers\EmployeeController;
use App\Controllers\ProductController;

return [
    ['GET', '/page1', [BaseController::class, 'page1'], "page1"],
    ['GET', '/page2', [BaseController::class, 'page2'], "page2"],
    ['GET', '/', [BaseController::class, 'home'], ""],
    ['GET', '/employees', [EmployeeController::class, 'index'], "employees"],
    ['GET', '/employees/create', [EmployeeController::class, 'create']],
    ['GET', '/employees/view', [EmployeeController::class, 'view']],
    ['POST', '/employees/store', [EmployeeController::class, 'store']],
    ['GET', '/employees/edit', [EmployeeController::class, 'edit']],
    ['POST', '/employees/update', [EmployeeController::class, 'update']],
    ['GET', '/employees/delete', [EmployeeController::class, 'delete']],
    ['GET', '/products', [ProductController::class, 'index']],
//    "page1" => ["page1", BaseController::class],
//    "page2" => ["page2", BaseController::class],
//    "" => ["home", BaseController::class],
//    "employees" => ["index", EmployeeController::class],
//    "employees/create" => ["create", EmployeeController::class],
//    "employees/store" => ["store", EmployeeController::class],
//    "employees/view" => ["view", EmployeeController::class],
//    "employees/edit" => ["edit", EmployeeController::class],
//    "employees/update" => ["update", EmployeeController::class],
//    "employees/delete" => ["delete", EmployeeController::class],
//    "products" => ["index", ProductController::class],
];