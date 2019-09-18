<?php

function view($view){
    $view = __DIR__ . "/../views/$view.php";
    include(__DIR__ . "/../views/template.php");
}