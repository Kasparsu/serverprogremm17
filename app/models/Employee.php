<?php


namespace App\Models;


use App\DI;
use PDO;
use PDOStatement;

class Employee
{
    public static $tableName = 'employee';
    public $id;
    public $fname;
    public $lname;
    public $bday;
    public $phone;

    public static function selectAll(){
        /** @var PDOStatement $stmt */
        $stmt = DI::$DB->getConn()->prepare("SELECT id, fname, lname, bday, phone FROM " . self::$tableName);
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $result = $stmt->fetchAll();
        return $result;
    }
}