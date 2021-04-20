<?php

namespace Src\Core;

use Exception;
use PDO;

class DatabaseConnection
{
    private $password;
    private $dsn;
    private $username;


    public function __construct()
    { 
        $host = $_ENV['DB_HOST'] ?? 'localhost';
        $db_name = $_ENV['DB_NAME'];

        $this->password = $_ENV['DB_PASSWORD'] ?? '';
        $this->username = $_ENV['DB_USER'];
        $this->dsn = "mysql:host={$host};dbname={$db_name};charset=utf8";  
    }

    public function getNewConnection() 
    {
        try{
            $con = new PDO($this->dsn, $this->username, $this->password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (Exception $ex) {
            echo 'Not Connected '.$ex->getMessage();
        }
    }

}