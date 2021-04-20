<?php

namespace Src\Core;

class View
{
    private $view;
    private $content;

    public function __construct($view, $data = [])
    {
        $this->view = $view;
        $this->data = $data;

        $this->render($data);
    }

    private function render()
    {
        extract($this->data);

        include '../src/views/' . $this->view;
    }
}