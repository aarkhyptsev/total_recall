<?php

namespace app\controllers;

use core\Controller;
use app\models\AdminPage;

class AdminPageController extends Controller
{

    public function showPage($num)
    {
        $num = !$num ? 1 : $num;
        //include 'app/layouts/admin_page.php';
        $model = new AdminPage();
        $books = $model->getBooksForPage($num);
        $total_pages = $model->getNumberAllPages();
        $this->title = 'Page ' . $num;
        $this->layout = 'admin_page';
        $pagination = ['total_pages' => $total_pages, 'current_page' => $num];
        //var_dump($pagination);
        //var_dump($books);
        $this->render('admin/items_table', ['books' => $books, 'pagination' => $pagination]);
    }

    public function addBook($something)
    {
        $previous_page = $_SERVER['HTTP_REFERER'];
        if((new AdminPage())->addBook()){
            header("Location: $previous_page");
            exit;
        };
    }
}