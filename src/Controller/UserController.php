<?php

namespace Backend\Firstapi\Controller;

use Backend\Firstapi\Services\UserService;

class UserController
{
    private static $defaultRoute = "/users";
    private $user;

    public function __construct()
    {
        $this->user = new UserService();
    }


    public function getDefaultRoute()
    {
        return self::$defaultRoute;
    }

    public function createUser($allowedMethod)
    {
        if ($allowedMethod === "POST") {
            http_response_code(200);
            echo $this->user->createUser();
        } else {
            http_response_code(response_code: 404);
            echo json_encode(
                [
                    "Msg" => "Method not allowed"
                ]
            );
        }
    }
}
