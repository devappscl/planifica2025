<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        // Renderiza la vista 'home.php' que contiene tu template
        return view('home');
    }
}