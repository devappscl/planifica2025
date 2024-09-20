<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/web/login');
    }
}
