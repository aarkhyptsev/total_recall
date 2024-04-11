<?php
require_once 'db_config.php';
// Подключаемся к MySQL серверу
$mysqli = new mysqli($db_host, $db_user, $db_pass);

// Проверяем соединение
if ($mysqli->connect_error) {
    die("Ошибка соединения: " . $mysqli->connect_error);
}
// Создаем базу данных
$database_name = "shpp_2";
$sql_create_database = "CREATE DATABASE $database_name";

if ($mysqli->query($sql_create_database) === TRUE) {
    echo "База данных успешно создана\n";
} else {
    echo "Ошибка при создании базы данных: " . $mysqli->error . "\n";
}
// Выбираем созданную базу данных
$mysqli->select_db($database_name);

// Создаем таблицу
$sql_create_table = "CREATE TABLE todo (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    text VARCHAR(30) NOT NULL,
    checked BOOLEAN NOT NULL,
    user_id INT(6) NOT NULL
    )";

if ($mysqli->query($sql_create_table) === TRUE) {
    echo "Таблица успешно создана\n";
} else {
    echo "Ошибка при создании таблицы: " . $mysqli->error . "\n";
}

// Создаем таблицу users
$sql_create_table = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL
)";

if ($mysqli->query($sql_create_table) === TRUE) {
    echo "Таблица успешно создана\n";
} else {
    echo "Ошибка при создании таблицы: " . $mysqli->error . "\n";
}

// Закрываем соединение
$mysqli->close();
?>