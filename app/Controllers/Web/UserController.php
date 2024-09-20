<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function home()
    {
        return view('user/home');
    }
}
