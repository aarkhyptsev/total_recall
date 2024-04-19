<?php

namespace app\models;

use core\Model;

class AdminPage extends Model
{
    public function getBooksForPage($num_page)
    {
        $limit = ADMIN_LIMIT;
        $offset = ($num_page - 1) * $limit;
        $query = "SELECT * FROM books LIMIT $offset, $limit";
        return $this->findMany($query);
    }

    public function getNumberAllPages()
    {
        $query = "SELECT COUNT(*) AS total_rows FROM books";
        $items_per_page = ADMIN_LIMIT;
        $total_items = $this->findOne($query);
        $total_items = $total_items['total_rows'];
        return ceil($total_items / $items_per_page);
    }

    public function addBook()
    {
        $book_img = $this->saveFile();
        extract($_POST);
        $query = "INSERT INTO books (book_name, book_author_1, book_img) VALUES ('$book_name', '$book_author_1', '$book_img')";
        return $this->noSelect($query);

    }
    public function deleteBook($id)
    {
        $query = "DELETE FROM books WHERE book_id = $id";
        return $this->noSelect($query);

    }

    public function saveFile()
    {
        // Проверяем, был ли отправлен файл
        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];

            // Проверяем, нет ли ошибок при загрузке файла
            if ($file['error'] === UPLOAD_ERR_OK) {
                // Путь, куда будет сохранен файл
                $upload_dir = 'public/images/';

                // Имя файла на сервере (можно оставить оригинальное имя или сгенерировать новое)
                $file_name = $file['name'];

                // Перемещаем файл из временной директории в заданное место
                move_uploaded_file($file['tmp_name'], $upload_dir . $file_name);

                //echo 'Файл успешно загружен.';
            } else {
                echo 'Произошла ошибка при загрузке файла.';
            }
        } else {
            echo 'Файл не был отправлен.';
        }
        return $file_name;
    }

}