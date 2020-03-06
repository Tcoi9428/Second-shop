<?php


namespace App\Service;


use App\Model\User;

class UserService
{
    public static  function getUserByName(string $username)
    {
        $username = DataBase()->escape($username);

        $query = "SELECT * FROM users WHERE name='$username'";
        return DataBase()->fetchRow($query ,User::class);
    }
    public static function getUserById(int $user_id)
    {
        $query = "SELECT * FROM users WHERE id=$user_id";
        return DataBase()->fetchRow($query , User::class);
    }
}