<?php

namespace Core;

class View
{
    public function render($layout, $title, $view, $data = [])
    {
        return $this->renderLayout($layout, $title, $this->renderView($view, $data));
    }

    private function renderLayout($layout, $title, $content)
    {
        $layoutPath = $_SERVER['DOCUMENT_ROOT'] . "/app/layouts/$layout.php";

        if (file_exists($layoutPath)) {
            ob_start();

            include $layoutPath; // тут будут доступны переменные $title и $content
            return ob_get_clean();
        }
    }

    private function renderView($view, $data)
    {
        $viewPath = $_SERVER['DOCUMENT_ROOT'] . "/app/views/$view.php";

        if (file_exists($viewPath)) {
            ob_start();
            extract($data);
            include $viewPath; // подключаем файл с представлением
            return ob_get_clean();
        }
    }
}