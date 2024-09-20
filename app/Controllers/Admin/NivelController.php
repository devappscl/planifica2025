<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class NivelController extends BaseController
{
    public function index()
    {
        echo view('admin/header');
        echo view('admin/niveles');  // Vista del home del administrador
        echo view('admin/footer');
    }
}
