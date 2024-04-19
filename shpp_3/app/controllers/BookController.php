<?php

namespace App\controllers;

use core\Controller;
use app\models\Book;

class BookController extends Controller
{

    public function showById($id)
    {
        $book = (new Book())->getById($id);
        $this->title = $book['book_name'];
        $this->render('book/one', $book);
    }

    public function showOffset($offset)
    {
        //Показать с $num + 20
        //$num = !$num ? 10 : $num;// 0 тоже ситается, строка не нужна
        $model = (new Book());
        $books = $model->getByOffset($offset);// передали смещение
        $offset_max = $model->getOffsetMax();
        $pagination = ['offset' => $offset, 'offset_max' => $offset_max];
        $this->title = 'Books collection';
        $this->render('book/many_books', ['books' => $books, 'pagination' => $pagination]);
    }

    public function clickUp($id)
    {
        $result = (new Book())->clickUp($id);
       /* if ($result) {
            header('Content-Type: application/json');

            // Отправляем ответ в формате JSON
            echo json_encode(['success'=> true]);
            exit;
        }*/
    }
}