<?php

namespace app\models;

use core\Model;

class Book extends Model
{
    public function getById($book_id)
    {
        $query="SELECT books.*, GROUP_CONCAT(authors.author_name SEPARATOR ', ') AS author_names
FROM books
JOIN books_authors ON books.book_id = books_authors.book_id
JOIN authors ON books_authors.author_id = authors.author_id
WHERE books.book_id = $book_id
GROUP BY books.book_id;
";
        //$query = "SELECT * FROM books WHERE book_id=$book_id";
        return $this->findOne($query);
    }

    public function getByOffset($offset)
    {
        $limit = LIMIT;
        $query = "SELECT books.*, GROUP_CONCAT(authors.author_name SEPARATOR ', ') AS author_names
FROM books
JOIN books_authors ON books.book_id = books_authors.book_id
JOIN authors ON books_authors.author_id = authors.author_id
WHERE books.delete_at IS NULL
GROUP BY books.book_id
LIMIT $offset, $limit;
";

        //$query = "SELECT * FROM books LIMIT $offset, $limit";
        return $this->findMany($query);

    }
    public function getOffsetMax()
    {
        $query = "SELECT COUNT(*) as total_rows FROM books WHERE delete_at IS NULL";
        $items_per_page = ADMIN_LIMIT;
        $total_items = $this->findOne($query);
        $total_items = $total_items['total_rows'];
        return ceil(($total_items-LIMIT) / OFFSET)*OFFSET;
    }
    public function clickUp($id)
    {
        $query = "UPDATE books SET book_click = book_click + 1 WHERE book_id = :book_id";
        $params=[':book_id'=>$id];
        return $this->noSelect($query,$params);
    }
}