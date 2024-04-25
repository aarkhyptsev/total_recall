<?php

namespace Core;

class ResponseHandler
{
    public static function sendError($message, $statusCode)
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode(['error' => $message]);
        exit;
    }
}