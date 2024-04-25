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

    protected function findOne($query, $params = [])
    {
        $statement = self::$link->prepare($query);
        $statement->execute($params);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $this->sanitizeData($result);
    }


    protected function findMany($query, $params = [])
    {
        $statement = self::$link->prepare($query);
        $statement->execute($params);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $this->sanitizeData($result);
    }


    protected function noSelect($query, $params = [])
    {
        $statement = self::$link->prepare($query);
        $success = $statement->execute($params);
        return $success;
    }

    private function sanitizeData($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                // Если значение является массивом, рекурсивно вызываем sanitizeData для этого массива
                if (is_array($value)) {
                    $data[$key] = $this->sanitizeData($value);
                } else {
                    // Если значение не является массивом, применяем очистку данных
                    $data[$key] = ($value!==null)? htmlspecialchars($value, ENT_QUOTES, 'UTF-8') : $value;
                }
            }
        } else {
            // Если $data не является массивом, применяем очистку данных
            $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        }

        return $data;
    }

}
