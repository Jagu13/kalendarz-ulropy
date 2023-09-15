<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MainPage extends BaseController
{
    public function index()
    {
        return view('mainpage'); // Renderowanie widoku mainpage
    }
}

