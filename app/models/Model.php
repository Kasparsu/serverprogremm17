<?php


namespace App\Models;


use App\DI;
use PDO;

class Model
{
    public static $tableName;

    public static function selectAll(){
        /** @var PDOStatement $stmt */
        $stmt = DI::$DB->getConn()->prepare("SELECT * FROM " . static::$tableName);
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);
        $result = $stmt->fetchAll();
        return $result;
    }
    public function save(){
        if(!$this->id){
            $sql = $this->getCreateSql();
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
        $stmt = DI::$DB->getConn()->prepare("SELECT * FROM " . static::$tableName . " WHERE id=$id");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $result = $stmt->fetch();
        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM " . static::$tableName . " WHERE id=$this->id";
        DI::$DB->getConn()->exec($sql);
    }

    public function getFields(){
        $properties = get_class_vars(static::class);
        unset($properties['id']);
        unset($properties['tableName']);
        return $properties;
    }
    public function getCreateSql(){
        $fields = $this->getFields();
        $fieldNames = array_keys($fields);
        $fieldNamesString = implode(', ', $fieldNames);
        $fieldsValuesString = '';
        foreach ($fieldNames as $name){
            $fieldsValuesString .= $this->$name . "', '";
        }
        $fieldsValuesString = substr($fieldsValuesString, 0, strlen($fieldsValuesString)-4 );
        $sql = "INSERT INTO " . static::$tableName . " (". $fieldNamesString .")
    VALUES ('" . $fieldsValuesString . "')";
        return $sql;
    }
    public function getUpdateSql(){
        $sql = "UPDATE " . self::$tableName . " SET fname='$this->fname', lname='$this->lname', bday='$this->bday', phone='$this->phone' WHERE id=$this->id";

    }
}