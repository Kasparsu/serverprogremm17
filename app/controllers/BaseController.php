<?php
namespace App\Controllers;

use App\DI;
use App\Models\Employee;
use App\Models\Product;
use PDO;
use PDOException;
use PDOStatement;

class BaseController {
    public function page1(){
        $product = new Product();
        $fields = $product->getFields();
        var_dump($fields);
    }
    public function page2(){
        view('page2');
    }
    public function home(){
        view('index');
    }
}