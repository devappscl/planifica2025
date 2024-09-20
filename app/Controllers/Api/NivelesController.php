<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\NivelModel;
use CodeIgniter\API\ResponseTrait;

class NivelesController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $nivelModel = new NivelModel();
        $niveles = $nivelModel->findAll();

        return $this->respond($niveles);
    }

    public function show($id = null)
    {
        $nivelModel = new NivelModel();
        $nivel = $nivelModel->find($id);

        if ($nivel) {
            return $this->respond($nivel);
        } else {
            return $this->failNotFound('Nivel no encontrado');
        }
    }

    public function create()
    {
        $rules = [
            'nombre' => 'required'
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $nivelModel = new NivelModel();
        $data = [
            'nombre' => $this->request->getVar('nombre')
        ];

        $nivelModel->insert($data);

        return $this->respondCreated(['message' => 'Nivel creado exitosamente']);
    }

    public function update($id = null)
    {
        $nivelModel = new NivelModel();
        $nivel = $nivelModel->find($id);

        if (!$nivel) {
            return $this->failNotFound('Nivel no encontrado');
        }

        $data = $this->request->getRawInput();
        $nivelModel->update($id, $data);

        return $this->respond(['message' => 'Nivel actualizado exitosamente']);
    }

    public function delete($id = null)
    {
        $nivelModel = new NivelModel();
        $nivel = $nivelModel->find($id);

        if (!$nivel) {
            return $this->failNotFound('Nivel no encontrado');
        }

        $nivelModel->delete($id);

        return $this->respondDeleted(['message' => 'Nivel eliminado exitosamente']);
    }
}
