<?php

namespace Backend\Firstapi\Services;

use Backend\Firstapi\Database\Connection as DatabaseConnection;

class UserService
{
    private $db;
    public function __construct(DatabaseConnection $connection){
       $this->db = $connection;
    }
    public function createUser()
    {
        return json_encode(
            [
                "msg" => "Construindo arquitetura bonita para o projeto"
            ]
        );
    }
}
