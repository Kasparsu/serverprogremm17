<?php
namespace App\Controllers;

use App\DI;
use App\Models\Employee;
use App\Models\Product;
use App\Models\User;
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
        //view('index');
    }
    public function secret(){
        if(User::auth()){
            echo "Super secret message <a href='/logout'>logout</a>";
        } else {
            echo "Access denied you looser!";
        }
    }
}