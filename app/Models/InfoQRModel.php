<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoQRModel extends Model
{
    protected $table            = 'info_publica_qr';
    protected $primaryKey       = 'id_info'; // Basado en el último SQL que ejecutamos
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    // Estos campos deben coincidir EXACTAMENTE con los de tu nueva BD
    protected $allowedFields    = [
        'id_mascota', 
        'nombre_visible', 
        'telefono_visible', 
        'direccion_visible', 
        'enfermedades', 
        'cuidados_especiales', 
        'mensaje_auxilio', 
        'nombre_alternativo', 
        'telefono_alternativo', 
        'token_qr', 
        'activa'
    ];
}