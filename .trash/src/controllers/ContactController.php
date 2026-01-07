<?php

namespace Jd\Amisam\Controllers;

use Jd\Amisam\Core\View;

class ContactController
{
    public function index()
    {
        #require_once __DIR__ . '/../views/contact.php';
        View::render('contact', ['title' => 'Contact Page']);
    }
}
