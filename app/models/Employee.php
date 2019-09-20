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
    public function save(){
        if(!$this->id){
        $sql = "INSERT INTO " . self::$tableName . " (fname, lname, bday, phone)
    VALUES ('$this->fname', '$this->lname', '$this->bday', '$this->phone')";
        } else {
            $sql = "UPDATE " . self::$tableName . " SET fname='$this->fname', lname='$this->lname', bday='$this->bday', phone='$this->phone' WHERE id=$this->id";
        }
        // use exec() because no results are returned
        DI::$DB->getConn()->exec($sql);
    }

    /**
     * @param $id
     * @return bool|Employee
     */
    public static function find($id){
        /** @var PDOStatement $stmt */
        $stmt = DI::$DB->getConn()->prepare("SELECT id, fname, lname, bday, phone FROM " . self::$tableName . " WHERE id=$id");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $result = $stmt->fetch();
        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM " . self::$tableName . " WHERE id=$this->id";
        DI::$DB->getConn()->exec($sql);
    }
}