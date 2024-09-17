<?php

namespace Backend\Firstapi;

require "../vendor/autoload.php";

use Backend\Firstapi\Routes\Routes;
$method = $_SERVER["REQUEST_METHOD"];
$uri = $_SERVER["REQUEST_URI"];

$router = new Routes();


$routes = [
    
    [
        'url' => '/home',
        'methods' => ['GET'], 
        'data' => ['message' => 'Hello, world!']
    ],
];


foreach ($routes as $route) {
    if (preg_match( $route['url'], $uri)) {
        $allowedMethods = $route['methods'];
        $data = $route['data'];
        $router->resolveRoute($route['url'], $uri, $allowedMethods, $data);
    }
}

http_response_code(404);
echo json_encode(['error' => 'Not Found']);
