<?php

// Получаем значение параметра action из query string
$action = $_GET['action'] ?? '';

// Определяем, какую функцию вызвать в зависимости от значения параметра action
switch ($action) {
    case 'login':
        include_once 'login.php';
        break;
    case 'logout':
        include_once 'logout.php';
        break;
    case 'getItems':
        include_once 'getItems.php';
        break;
    case 'addItem':
        include_once 'addItem.php';
        break;
    case 'changeItem':
        include_once 'changeItem.php';
        break;
    case 'deleteItem':
        include_once 'deleteItem.php';
        break;
    case 'register':
        include_once 'register.php';
        break;
    default:
        // Возвращаем ошибку, если действие не определено
        http_response_code(400);
        echo json_encode(["error" => "Unknown action"]);
}
