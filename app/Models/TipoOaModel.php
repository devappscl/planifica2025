<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoOaModel extends Model
{
    protected $table = 'db_tipooa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre'];
}
