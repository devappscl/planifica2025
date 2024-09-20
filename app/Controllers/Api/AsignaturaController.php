<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\AsignaturaModel;
use CodeIgniter\API\ResponseTrait;

class AsignaturaController extends ResourceController
{
    use ResponseTrait;

    // Obtener todas las asignaturas
    public function index()
    {
        $model = new AsignaturaModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    // Crear una nueva asignatura
    public function create()
    {
        $model = new AsignaturaModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'nivel_id' => $this->request->getPost('nivel_id') // Relacionar con nivel educativo
        ];

        if ($model->insert($data)) {
            return $this->respondCreated(['status' => 'success', 'message' => 'Asignatura creada exitosamente']);
        } else {
            return $this->failValidationErrors($model->errors());
        }
    }

    // Obtener una asignatura por ID
    public function show($id = null)
    {
        $model = new AsignaturaModel();
        $data = $model->find($id);

        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Asignatura no encontrada');
        }
    }

    // Actualizar una asignatura
    public function update($id = null)
    {
        $model = new AsignaturaModel();

        // Capturar el JSON recibido y devolverlo temporalmente
        $data = $this->request->getJSON(true);
        
        if (empty($data)) {
            return $this->respond(['status' => 'fail', 'message' => 'No data received']);
        }
        
        return $this->respond(['received_data' => $data]);  // Ver qué datos se están enviando

        // Si los datos son correctos, continuar con la actualización
        if ($model->update($id, $data)) {
            return $this->respond(['status' => 'success', 'message' => 'Asignatura actualizada exitosamente']);
        } else {
            return $this->failValidationErrors($model->errors());
        }
    }


    // Eliminar una asignatura
    public function delete($id = null)
    {
        $model = new AsignaturaModel();
        if ($model->find($id)) {
            $model->delete($id);
            return $this->respondDeleted(['status' => 'success', 'message' => 'Asignatura eliminada exitosamente']);
        } else {
            return $this->failNotFound('Asignatura no encontrada');
        }
    }
}
