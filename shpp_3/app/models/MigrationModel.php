<?php

namespace App\Models;

use Core\Model;

class MigrationModel extends Model
{
    public function checkMigrations($files)
    {
        // Проверяет существование versions
        $query = "SHOW TABLES LIKE 'versions'";
        $tableExists = count($this->findMany($query)) > 0;
        // Если существует, то возвращаем список невыполненных миграций, иначе весь список
        if ($tableExists) {
            return $this->getMigrations($files);
        } else {
            return $files;
        }
    }

    public function getMigrations($files)
    {
        {
            $query = "SELECT name FROM versions";
            $result = $this->findMany($query);
            $result = array_column($result, 'name');
            return array_diff($files, $result);
        }
    }

    public function runMigrations($migrations)
    {
        sort($migrations);
        foreach ($migrations as $file) {
            $query = file_get_contents($file);
            $this->noSelect($query);
            echo '<br>Migrate from: ' . $file;
            $params = [':file' => $file];
            $query = "INSERT INTO versions (name) VALUES (:file)";
            $this->noSelect($query, $params);
        }
    }
}