<?php

namespace App\Controllers;

use App\Models\MascotaModel;
use App\Models\InfoQRModel;
use App\Models\UsuarioModel;

class Perfil extends BaseController
{
    public function ver($id_mascota = null)
    {
        // 1. Validar que exista un ID
        if (!$id_mascota) {
            return redirect()->to(base_url());
        }

        $mascotaModel = new MascotaModel();
        $infoModel    = new InfoQRModel();
        $usuarioModel = new UsuarioModel();

        // 2. Buscar datos de la mascota
        $mascota = $mascotaModel->find($id_mascota);
        if (!$mascota) {
            return "<h3>Error: La mascota no existe en nuestro sistema.</h3>";
        }

        // 3. Buscar datos del dueño
        $dueno = $usuarioModel->find($mascota['id_usuario']);

        // 4. Buscar configuración de privacidad
        $info = $infoModel->where('id_mascota', $id_mascota)->first();

        // 5. Valores por defecto si el dueño nunca configuró la privacidad
        if (!$info) {
            $info = [
                'nombre_visible'      => 1,
                'telefono_visible'    => 1,
                'direccion_visible'   => 0,
                'mensaje_auxilio'     => '',
                'nombre_alternativo'  => '',
                'telefono_alternativo'=> '',
            ];
        }

        // 6. Enviar a la vista (Asegúrate de que la carpeta y nombre coincidan)
        return view('perfil_publico', [
            'm'     => $mascota,
            'info'  => $info,
            'dueno' => $dueno
        ]);
    }
}