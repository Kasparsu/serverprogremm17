<?php
namespace App; 

class Cat {
    public $age;
    protected $color;
    private $isMale;

    public function __construct($age, $color, $isMale){
        $this->age = $age;
        $this->color = $color;
        $this->isMale = $isMale;
    }
    // public function __invoke(){
    //     $this->meow();
    // }
    // public function __destruct() {
    //     echo "Cat was Destroyed";
    // }
    // public function __call($name, $arguments) {
    //     var_dump($name, $arguments);
    // }
    // public function __get($name) {
    //     var_dump($name);
    //     return 10;
    // }
    // public function __set($name, $value) {
    //     var_dump($name, $value);
    // }

    // public function __toString(){
    //     $sex = "male";
    //     if(!$this->isMale){
    //         $sex = "female";
    //     }
    //     return "Cat is {$this->age} years old, {$this->color} color and is $sex"; 
    // }

    public function meow() {
        echo "Meow";
    }

    public function purr() {
        echo "Purr";
    }
}