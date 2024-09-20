<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'db_usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = [
        'usuario', 'rut', 'nombres', 'papellido', 'sapellido', 'email', 
        'password', 'estado', 'nivel', 'fecha_registro', 'email_verification_token', 
        'email_verified', 'password_reset_token', 'password_reset_token_expiry'
    ];

    protected $useTimestamps = false; // If you need timestamps, change to true
}
