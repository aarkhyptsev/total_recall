<?php

namespace core;

use core\View;

class Controller
{
    protected $layout = 'default';
    protected $title = 'Shpp_3';

    protected function render($view, $data = [])
    {
        echo (new View())->render($this->layout, $this->title, $view, $data);
    }
}