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
        view('page1');
    }
    public function page2(){
        view('page2');
    }
    public function home(){
        if($_GET['color']) {
            $_SESSION['color'] = $_GET['color'];
        }
        var_dump($_SESSION['color']);
        //view('index');
    }
}