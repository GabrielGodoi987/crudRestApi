<?php

namespace Backend\Firstapi;

require "../vendor/autoload.php";

use Backend\Firstapi\Controller\UserController;
use Backend\Firstapi\Database\Connection;
use Backend\Firstapi\Routes\Routes;

// Conexão com banco de dados


// Controllers
$user = new UserController();

// ROTA PARA FAZER LOGIN DE USUARIOS
//ROTA PARA LISTAR TODOS OS USUÁRIOS

// ROTA PARA CRIAR USUÁRIOS
Routes::post('/', function () use ($user) {
    echo $user->createUser('POST');
});

// ROTA PARA ATUALIZAR USUÁRIOS

// ROTA PARA DELETAR USUÁRIOS

Routes::resolve();
Connection::createDatabaseInstance(
    [
        "DB_TYPE" => "mysql",
        "DB_HOST" => "localhost",
        "DB_USER" => "root",
        "DB_PASS" => "localhost123",
        "DB_PORT" => "3306",
        "DB_NAME" => "UserManagement"
    ]
);