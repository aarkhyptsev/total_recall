<?php

namespace app\models;

use core\Model;

class Book extends Model
{
    public function getById($book_id)
    {
        $query = "SELECT * FROM books WHERE book_id=$book_id";
        return $this->findOne($query);
    }
    public function getByOffset($number)
    {
        $query = "SELECT * FROM books LIMIT $number";
        return $this->findMany($query);
    }
}