<?php

namespace Backend\Firstapi\Database;

use PDO;
use PDOException;

class Connection
{
    private $typeDb;
    private $host;
    private $user;
    private $password;
    private $port;
    private $db_name;


    private $instance = null;

    private function  __construct($data)
    {
        self::$typeDb = $data["DB_TYPE"];
        self::$host = $data["DB_HOST"];
        self::$user = $data["DB_USER"];
        self::$password = $data["DB_PASS"];
        self::$port = $data["DB_PORT"];
        self::$db_name = $data["DB_NAME"];
    }

    public static function createDatabaseInstance($data)
    {
        if (self::$instance === null)
            self::$instance = new self($data);

        return false;
    }

    public function createConnection()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name}";
            new PDO($dsn, $this->user, $this->password) . exec("set names utf8");
        } catch (PDOException $e) {
            echo json_encode(
                [
                    "msg" => "erro ao se conectar com banco de dados",
                    "error" => $e->getMessage()
                ]
            );
        }
    }
}
