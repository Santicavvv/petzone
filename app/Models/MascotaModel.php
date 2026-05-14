<?php

namespace App\Models;

use CodeIgniter\Model;

class MascotaModel extends Model
{
    protected $table            = 'mascota';
    protected $primaryKey       = 'id_mascota';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'id_usuario', 'nombre', 'especie', 'raza', 
        'fecha_nacimiento', 'sexo', 'peso', 
        'foto_url', 'observaciones', 'estado_qr'
    ];
}