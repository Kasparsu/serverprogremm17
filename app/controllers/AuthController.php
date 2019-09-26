<?php


namespace App\Controllers;


use App\Models\User;

class AuthController
{
    public function registerPage(){
        view('auth/register');
    }
    public function register(){
        $user = new User();
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->name =  $_POST['name'];
        $user->save();
        header('Location: /login');
        die();
    }
    public function loginPage(){
        view('auth/login');
    }
    public function login(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = User::select("email='$email' AND password='$password'");
        if($user){
            $_SESSION['userId'] = $user->id;

            if($_POST['remember']){
                $hash = md5(time() . $user->id);
                setcookie('userId', $hash, time()+60*60*24*30, '/' );
                $user->token = $hash;
                $user->save();
            }
            header('Location: /secret');
        } else {
            header('Location: /login');
        }
        die();
    }
    public function logout(){
        $user = User::auth();
        $user->token = null;
        $user->save();
        unset($_SESSION['userId']);
        setcookie('userId', '', time()+60*60*24*30, '/' );

        header('Location: /login');
        die();
    }
}