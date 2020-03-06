<?php


namespace App\Controller;


use App\Service\RequestService;
use App\Service\UserService;

class User
{
    private function __construct()
    {
    }

    public static function login()
    {
        $login = RequestService::getStringFromPost('login');
        $password = RequestService::getStringFromPost('password');

        /**
         * @var $user \App\Model\User
         */

        $user = UserService::getUserByName($login);

        $error_message= "User with login :$login - not found or password incorrect";

        if( is_null($user) || $user->getPassword() !== $password){
            echo $error_message;
            exit();
        }
        //echo '<pre>'; var_dump($user); echo '</pre>'; exit();

        $_SESSION['user_id'] = $user->getId();
        RequestService::redirect('/');
    }
}