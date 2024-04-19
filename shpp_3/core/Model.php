<?php

namespace Core;

use PDO;
use PDOException;

class Model
{
    private static $link;

    public function __construct()
    {
        if (!self::$link) {
            try {
                $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
                self::$link = new PDO($dsn, DB_USER, DB_PASS, $options);
            } catch (PDOException $e) {
                // Обработка ошибки подключения к базе данных
                ResponseHandler::sendError('Error connecting to database:' . $e->getMessage(), 500);
            }
        }
    }

    protected function findOne($query)
    {
        $statement = self::$link->query($query);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    protected function findMany($query)
    {
        $statement = self::$link->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    protected function noSelect($query)
    {
        $result = self::$link->exec($query);
        return $result !== false; // Возвращает true при успешном выполнении запроса
    }
}
