<?php

namespace Src\Controllers;

class HomeController
{
    public function welcome()
    {
        return header('Location: /articles');
    }
}
