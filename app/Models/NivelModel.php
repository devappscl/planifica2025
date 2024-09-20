<?php

namespace App\Models;

use CodeIgniter\Model;

class NivelModel extends Model
{
    protected $table = 'db_niveleducativo';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre'];
}
