<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function home()
    {
        return view('admin/home');  // Cargar la vista del home del administrador
    }
}