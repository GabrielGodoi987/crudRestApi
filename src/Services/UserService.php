<?php

namespace Backend\Firstapi\Services;


class UserService
{
    public function createUser()
    {
        return json_encode(
            [
                "msg" => "Construindo arquitetura bonita para o projeto"
            ]
        );
    }
}
