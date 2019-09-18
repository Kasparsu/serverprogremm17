<?php
namespace App\Controllers;

class BaseController {
    public function page1(){
        view('page1');
    }
    public function page2(){
        view('page2');
    }
    public function home(){
        view('index');
    }
}