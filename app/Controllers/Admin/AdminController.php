<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function home()
    {
        return view('admin/home');  // Vista del home del administrador
    }
}
