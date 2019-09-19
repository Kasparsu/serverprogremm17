<?php
namespace App\Controllers;

use App\DI;
use App\Models\Employee;
use PDO;
use PDOException;
use PDOStatement;

class BaseController {
    public function page1(){
        view('page1');
    }
    public function page2(){
        view('page2');
    }
    public function home(){
        $result = Employee::selectAll();
        var_dump($result);
        view('index');
    }
}