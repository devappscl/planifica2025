<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\OaModel; // Cargar el modelo que gestionará los OAs
use CodeIgniter\API\ResponseTrait;

class OasController extends BaseController
{
    use ResponseTrait;

    // Obtener todos los OAs de una asignatura
    public function index($asignaturaId)
    {
        $model = new OaModel();
        $oas = $model->where('id_asignatura', $asignaturaId)->findAll();
        return $this->respond($oas);
    }

    // Obtener un solo OA basado en su ID
    public function show($id)
    {
        $model = new OaModel();
        
        // Buscar el OA basado en su ID
        $oa = $model->find($id);
        
        // Si no se encuentra, devolver un mensaje de error
        if (!$oa) {
            return $this->failNotFound('No se encontró el OA con el ID proporcionado.');
        }

        // Devolver el OA encontrado
        return $this->respond($oa);
    }

    // Crear un nuevo OA
    public function create()
    {
        $model = new OaModel();
        $data = $this->request->getJSON();
        $model->insert($data);
        return $this->respondCreated($data);
    }

    // Actualizar un OA existente
    public function update($id)
    {
        $model = new OaModel();
        $data = $this->request->getJSON();
        $model->update($id, $data);
        return $this->respond($data);
    }

    
    // Eliminar un OA
    public function delete($id)
    {
        $model = new OaModel();

        // Comprobar si el OA existe antes de eliminarlo
        $oa = $model->find($id);

        if (!$oa) {
            // Si no se encuentra el OA, devolver un mensaje de error
            return $this->failNotFound('No se encontró el OA con el ID proporcionado.');
        }

        try {
            // Intentar eliminar el OA
            if ($model->delete($id)) {
                return $this->respondDeleted(['message' => 'OA eliminado correctamente']);
            } else {
                // Si la eliminación falla por algún motivo, devolver un error genérico
                return $this->fail('No se pudo eliminar el OA.');
            }
        } catch (\Exception $e) {
            // Capturar cualquier excepción y devolver un mensaje de error
            return $this->failServerError('Error al eliminar el OA: ' . $e->getMessage());
        }
    }


}
