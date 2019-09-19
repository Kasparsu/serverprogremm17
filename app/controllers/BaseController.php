<?php
namespace App\Controllers;

use App\DI;
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
        /** @var PDOStatement $stmt */
        $stmt = DI::$DB->getConn()->prepare("SELECT id, fname, lname, bday, phone FROM employee");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        view('index');
    }
}