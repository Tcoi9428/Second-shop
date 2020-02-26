<?php

namespace App\Db;
class MySql
{
    private $host;
    private $user;
    private $password;
    private $db_name;
    private $connect;


    public function __construct(string $host , string $user , string $password , string $db_name)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db_name = $db_name;
    }

    private function connect(){
        if(!$this->connect){
            $this->connect = mysqli_connect($this->host , $this->user , $this->password , $this-> db_name);
            mysqli_set_charset($this->connect, 'utf8');
            $mysql_error = mysqli_connect_errno();
            if ($mysql_error > 0) {
                $message = "Mysql connect error: $mysql_error ";
                die($message);
            }
        }
        return $this->connect;
    }

    public function query($query){
        $result = mysqli_query($this->connect(), $query);
        $this->checkErrors();
        return $result;
    }

    public function fetchAll($query){
        $result = $this->query($query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function insert(){
        return mysqli_insert_id($this->connect());
    }
    private function checkErrors() {
        $mysqli_errno = mysqli_errno($this->connect());
        if (!$mysqli_errno) {
            return true;
        }
        $mysqli_error = mysqli_error($this->connect());
        $message = "Mysql query error: ($mysqli_errno) $mysqli_error";
        die($message);
    }
}