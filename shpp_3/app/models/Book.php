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
}