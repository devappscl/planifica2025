<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\TipoOaModel;
use CodeIgniter\API\ResponseTrait;

class TipoOAController extends BaseController
{
    use ResponseTrait;

    // Obtener todos los tipos de OA
    public function index()
    {
        $model = new TipoOaModel();
        $tipos = $model->findAll();
        return $this->respond($tipos);
    }
}
