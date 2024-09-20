<?php

namespace App\Models;

use CodeIgniter\Model;

class AsignaturaModel extends Model
{
    protected $table = 'db_asignaturas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre','color', 'id_niveleducativo'];
    protected $validationRules = [
        'nombre' => 'required|min_length[3]',
        'id_niveleducativo' => 'required|integer'
    ];
}
