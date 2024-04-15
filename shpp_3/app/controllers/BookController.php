<?php

namespace App\controllers;

use core\Controller;
use app\models\Book;

class BookController extends Controller
{

    public function showById($id)
    {
        $book = (new Book())->getById($id);
        $this->title=$book['book_name'];
        $this->render('book/one', $book);
    }
}