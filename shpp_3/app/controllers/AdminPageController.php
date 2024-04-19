<?php

namespace app\controllers;

use core\Controller;
use app\models\AdminPage;

class AdminPageController extends Controller
{
    // Метод для проверки авторизации
    private function requireAuth()
    {
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        $has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
        $is_not_authenticated = (
            !$has_supplied_credentials ||
            $_SERVER['PHP_AUTH_USER'] != AUTH_USER ||
            $_SERVER['PHP_AUTH_PW'] != AUTH_PASS
        );
        if ($is_not_authenticated) {
            header('HTTP/1.1 401 Authorization Required');
            header('WWW-Authenticate: Basic realm="Access denied"');
            exit;
        }
    }

    public function showPage($num)
    {
        $this->requireAuth();
        $num = !$num ? 1 : $num;
        $model = new AdminPage();
        $books = $model->getBooksForPage($num);
        $total_pages = $model->getNumberAllPages();
        $this->title = 'Page ' . $num;
        $this->layout = 'admin_page';
        $pagination = ['total_pages' => $total_pages, 'current_page' => $num];
        $this->render('admin/items_table', ['books' => $books, 'pagination' => $pagination]);
    }

    public function addBook($something)
    {
        $this->requireAuth();
        $previous_page = $_SERVER['HTTP_REFERER'];
        if ((new AdminPage())->addBook()) {
            header("Location: $previous_page");
            exit;
        };
    }
    public function deleteBook($id)
    {
        $this->requireAuth();
        $previous_page = $_SERVER['HTTP_REFERER'];
        if ((new AdminPage())->deleteBook($id)) {
            header("Location: $previous_page");
            exit;
        };
    }

    public function logout($something)
    {
        $this->requireAuth();
        $logout = file_get_contents('app/layouts/logout.php');
        echo $logout;
    }
}