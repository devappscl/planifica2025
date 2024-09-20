<?php

namespace App\Models;

use CodeIgniter\Model;

class OaModel extends Model
{
    protected $table = 'db_oas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_asignatura', 'id_oa_tipo','nombrecorto','descripcion'];
}
