<?php

namespace Jd\Amisam\Controllers;

use Jd\Amisam\Core\View;

class HomeController
{
    public function index()
    {
        View::render('home', ['title' => 'Home Page']);
    }

    public function view()
    {
        View::render('home2', ['title' => 'Home Page 2']);
    }
}
