<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'usuario';
    protected $primaryKey       = 'id_usuario';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    // Definimos los campos que permitiremos insertar/editar
    protected $allowedFields    = ['nombre', 'apellido', 'email', 'contrasena', 'telefono', 'fecha_registro'];

    // Activamos el manejo de fechas automático si lo deseas
    protected $useTimestamps = false; 
}