<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function home()
    {
        echo view('admin/header');
        echo view('admin/home');  // Vista del home del administrador
        echo view('admin/footer');
    }
}