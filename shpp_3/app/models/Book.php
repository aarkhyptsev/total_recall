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

    public function getByOffset($offset)
    {
        $limit = LIMIT;
        $query = "SELECT * FROM books LIMIT $offset, $limit";
        return $this->findMany($query);

    }
    public function getOffsetMax()
    {
        $query = "SELECT COUNT(*) AS total_rows FROM books";
        $items_per_page = ADMIN_LIMIT;
        $total_items = $this->findOne($query);
        $total_items = $total_items['total_rows'];
        return ceil(($total_items-LIMIT) / OFFSET)*OFFSET;
    }
    public function clickUp($id)
    {
        $query = "UPDATE books SET book_click=book_click+1 WHERE book_id=$id";
        return $this->insert($query);
    }
}