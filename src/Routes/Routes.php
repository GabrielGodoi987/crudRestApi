<?php

namespace Backend\Firstapi\Routes;

class Routes
{
    private static $routes = [];

    public static function addRoute($method, $url, $callback) {
        self::$routes[] = [
            'method' => $method,
            'url' => $url,
            'callback' => $callback
        ];
    }

    public static function resolve() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach (self::$routes as $route) {
            if ($route['method'] === $method && $route['url'] === $uri) { 
                return call_user_func(callback: $route['callback']);
            }
        }

        // Se não encontrou a rota, retorna 404
        http_response_code(404);
        echo json_encode([
            "Msg" => "Route not found or method not allowed"
        ]);
    }

    public static function get($url, $callback) {
        self::addRoute('GET', $url, $callback);
    }

    public static function post($url, $callback) {
        self::addRoute('POST', $url, $callback);
    }

    // Outros métodos podem ser adicionados de forma similar
    public static function put($url, $callback) {
        self::addRoute('PUT', $url, $callback);
    }

    public static function delete($url, $callback) {
        self::addRoute('DELETE', $url, $callback);
    }
}
