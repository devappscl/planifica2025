<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AsignaturaController extends BaseController
{
    public function index()
    {
        echo view('admin/header');
        echo view('admin/asignaturas');
        echo view('admin/footer');
    }
}