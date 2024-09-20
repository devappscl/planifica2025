<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class RegisterController extends BaseController
{
    public function index()
    {
        return view('register/register'); // Cargar la vista del formulario de registro
    }
}
