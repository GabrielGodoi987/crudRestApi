<?php

namespace Backend\Firstapi;

require "../vendor/autoload.php";

use Backend\Firstapi\Controller\UserController;
use Backend\Firstapi\Database\Connection;
use Backend\Firstapi\Routes\Routes;

require "./Database/Config.php";

// Conexão com banco de dados
Connection::createDatabaseInstance($dataConnection);

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
