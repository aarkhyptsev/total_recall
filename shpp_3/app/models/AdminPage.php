<?php

namespace app\models;

use core\Model;
use core\ResponseHandler;

class AdminPage extends Model
{
    public function getBooksForPage($num_page)
    {
        $limit = ADMIN_LIMIT;
        $offset = ($num_page - 1) * $limit;
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

    public function getNumberAllPages()
    {
        $query = "SELECT COUNT(*) AS total_rows FROM books WHERE delete_at IS NULL";
        $items_per_page = ADMIN_LIMIT;
        $total_items = $this->findOne($query);
        $total_items = $total_items['total_rows'];
        return ceil($total_items / $items_per_page);
    }

    public function addBook()
    {
        $book_img = $this->saveFile();
        $book_name = filter_input(INPUT_POST, 'book_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $book_year = $_POST['year'];
        // Добавить автора в таблицу и заполнить массив авторов
        $authors_id = [];
        foreach ($_POST['book_authors'] as $author) {
            if ($author != '') {
                $author = htmlspecialchars(trim($author));
                $authors_id[] = $this->addAuthor($author);
            }
        }

        $query = "INSERT INTO books (book_name, book_img, book_year) VALUES (:book_name, :book_img, :book_year)";
        $params = array(':book_name' => $book_name, ':book_img' => $book_img, ':book_year' => $book_year);

        $this->noSelect($query, $params);
        $query = "SELECT book_id FROM books ORDER BY book_id DESC LIMIT 1";
        $book_id = $this->findOne($query);
        $book_id = $book_id['book_id'];
        return $this->createRelation($book_id, $authors_id);
    }

    public function createRelation($book_id, $authors_id)
    {
        $result = false;
        foreach ($authors_id as $author_id) {
            $query = "INSERT INTO books_authors (book_id, author_id) VALUES (:book_id, :author_id)";
            $params = array(':book_id' => $book_id, ':author_id' => $author_id);
            $result = $this->noSelect($query, $params);
        }
        return $result;
    }

    /**
     *  Добавляет автора, если его еще нет в таблице
     * @param $author
     * @return void
     */
    public function addAuthor($author)
    {
        $query = "SELECT COUNT(*) AS author_count FROM authors WHERE author_name = :author_name";
        $params = [':author_name' => $author];
        $author_count = $this->findOne($query, $params);
        if (!$author_count['author_count']) {
            $query = "INSERT INTO authors (author_name) VALUES (:author_name)";
            $this->noSelect($query, $params);
        }
        $query = "SELECT author_id FROM authors WHERE author_name = :author_name";
        $author_id = $this->findOne($query, $params);
        return $author_id['author_id'];
    }


    public function deleteBook($id)
    {
        $query = "UPDATE books
SET delete_at = CURRENT_TIMESTAMP
WHERE book_id = :book_id";
        $params = array(':book_id' => $id);
        return $this->noSelect($query, $params);
    }

    public function getIdDeletion()
    {
        $query = "SELECT book_id FROM books WHERE delete_at IS NOT NULL";
        $response = $this->findMany($query);
        $deletion_id=[];
        if ($response) {
            foreach ($response as $book) {
                $deletion_id[] = $book['book_id'];
            }
        }
        return $deletion_id;
    }
    public function runIdDeletion($deletion_id)
    {
        foreach ($deletion_id as $book_id){
            $query="DELETE FROM books_authors WHERE book_id=:book_id";
            $params=[':book_id'=>$book_id];
            $this->noSelect($query,$params);
            $query="SELECT book_img FROM books WHERE book_id=:book_id";
            $book_img=$this->findOne($query,$params);
            $book_img=$book_img['book_img'];
            if (unlink('public/images/'.$book_img)) {
                echo 'Файл успешно удален.';
            } else {
                echo 'Не удалось удалить файл.';
            }
            $query="DELETE FROM books WHERE book_id=:book_id";
            $this->noSelect($query,$params);
        }
    }

    public function saveFile()
    {
        if (!isset($_FILES['file'])) {
            ResponseHandler::sendError('Файл не был отправлен . ', 400);
        }

        $file = $_FILES['file'];

        // Проверяем, нет ли ошибок при загрузке файла
        if ($file['error'] !== UPLOAD_ERR_OK) {
            ResponseHandler::sendError('Произошла ошибка при загрузке файла . ', 500);
        }

        // Путь, куда будет сохранен файл
        $upload_dir = 'public/images/';

        // Имя файла на сервере (можно оставить оригинальное имя или сгенерировать новое)
        $file_name = $file['name'];
        $file_type = $file['type'];
        if (file_exists($upload_dir.$file_name)) {
            $file_name=str_replace('.', '1.', $file_name);;
        }

// Проверка типа файла (допустимы только изображения)
        if (strpos($file_type, 'image/') !== 0) {
            ResponseHandler::sendError('Only image files are allowed . ', 400);
        }

        // Перемещаем файл из временной директории в заданное место
        if (!move_uploaded_file($file['tmp_name'], $upload_dir . $file_name)) {
            ResponseHandler::sendError('Не удалось переместить файл в указанную директорию . ', 500);
        }

        return $file_name;
    }

}