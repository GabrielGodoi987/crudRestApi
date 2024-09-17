<?php

namespace Backend\Firstapi\Routes;

class Routes
{
    public function resolveRoute($url, $uri, $allowedMethods, $data)
    {
        header('Content-Type: application/json');

        if (preg_match($url, $uri)) {
            $currentMethod = $_SERVER['REQUEST_METHOD'];
            if (in_array($currentMethod, $allowedMethods)) {
                echo $this->requestResponseBehavior($data);
            } else {
                http_response_code(405); // Método não permitido
                echo $this->requestResponseBehavior(['error' => 'Method Not Allowed']);
            }
        } else {
            http_response_code(404); // Rota não encontrada
            echo $this->requestResponseBehavior(['error' => 'Not Found']);
        }
    }

    public function requestResponseBehavior($dataResponse)
    {
        return json_encode($dataResponse);
    }
}
