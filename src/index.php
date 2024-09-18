<?php

namespace Backend\Firstapi;

require "../vendor/autoload.php";

use Backend\Firstapi\Controller\UserController;
use Backend\Firstapi\Routes\Routes;

// Controllers
$user = new UserController();

// Define as rotas
Routes::get('/', function() use ($user) {
    echo $user->createUser('GET');
});

Routes::resolve();
