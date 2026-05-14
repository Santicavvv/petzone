<?php

namespace App\Controllers;

use App\Models\MascotaModel;
use App\Models\InfoQRModel;

class Mascotas extends BaseController
{
    // 1. LISTADO PRINCIPAL (Filtra por usuario logueado)
    public function index()
    {
        $model = new MascotaModel();
        $userId = session()->get('id_usuario');
        
        $data['mascotas'] = $model->where('id_usuario', $userId)->findAll();
        return view('mascotas/index', $data);
    }

    // 2. FORMULARIO DE CREACIÓN (Carga la vista)
    public function crear()
    {
        return view('mascotas/crear');
    }

    // 3. GUARDAR NUEVA MASCOTA (Incluye todos los campos)
    public function guardar()
    {
        $model = new MascotaModel();
        $qrModel = new InfoQRModel();
        $userId = session()->get('id_usuario');

        if (!$userId) {
            return redirect()->to('auth/login')->with('err', 'Tu sesión ha expirado.');
        }

        $dataMascota = [
            'nombre'        => $this->request->getPost('nombre'),
            'raza'          => $this->request->getPost('raza'),
            'sexo'          => $this->request->getPost('sexo'),
            'peso'          => $this->request->getPost('peso'),
            'observaciones' => $this->request->getPost('observaciones'),
            'id_usuario'    => $userId
        ];

        $id_insertado = $model->insert($dataMascota);

        if ($id_insertado) {
            $dataQR = [
                'id_mascota' => $id_insertado,
                'telefono'   => $this->request->getPost('telefono'),
                'notas'      => $this->request->getPost('notas')
            ];
            $qrModel->insert($dataQR);
        }

        return redirect()->to('/mascotas')->with('mensaje', '¡Mascota registrada con éxito!');
    }

    // 4. FORMULARIO DE EDICIÓN (Valida acceso)
    public function editar($id)
    {
        $model = new MascotaModel();
        $qrModel = new InfoQRModel();
        $userId = session()->get('id_usuario');

        // Solo permitir si la mascota pertenece al usuario
        $data['mascota'] = $model->where(['id_mascota' => $id, 'id_usuario' => $userId])->first();
        
        if (!$data['mascota']) {
            return redirect()->to('/mascotas')->with('error', 'Acceso denegado o mascota inexistente.');
        }

        $data['info_qr'] = $qrModel->where('id_mascota', $id)->first();
        return view('mascotas/editar', $data);
    }

    // 5. ACTUALIZAR (Corregido: Sin error de DataException)
    public function actualizar()
    {
        $model = new MascotaModel();
        $qrModel = new InfoQRModel();
        
        $id = $this->request->getPost('id_mascota');
        $userId = session()->get('id_usuario');

        // Validar propiedad
        $mascotaActual = $model->where(['id_mascota' => $id, 'id_usuario' => $userId])->first();
        if (!$mascotaActual) {
            return redirect()->to('/mascotas')->with('error', 'No tienes permiso para esta acción.');
        }

        // Recoger datos del formulario
        $dataMascota = [
            'nombre'        => $this->request->getPost('nombre'),
            'raza'          => $this->request->getPost('raza'),
            'sexo'          => $this->request->getPost('sexo'),
            'peso'          => $this->request->getPost('peso'),
            'observaciones' => $this->request->getPost('observaciones')
        ];

        // Solo ejecutar update si hubo cambios (Evita Exception de CI4)
        if ($mascotaActual['nombre'] !== $dataMascota['nombre'] || 
            $mascotaActual['raza']   !== $dataMascota['raza'] || 
            ($mascotaActual['sexo'] ?? '') !== $dataMascota['sexo'] || 
            ($mascotaActual['peso'] ?? '') !== $dataMascota['peso'] ||
            ($mascotaActual['observaciones'] ?? '') !== $dataMascota['observaciones']) {
            
            $model->update($id, $dataMascota);
        }

        // Actualizar Info QR
        $telPost = $this->request->getPost('telefono');
        $notasPost = $this->request->getPost('notas');
        $existeQR = $qrModel->where('id_mascota', $id)->first();
        
        if ($existeQR) {
            if (($existeQR['telefono'] ?? '') !== $telPost || ($existeQR['notas'] ?? '') !== $notasPost) {
                $qrModel->update($existeQR['id_info'], ['telefono' => $telPost, 'notas' => $notasPost]);
            }
        } else {
            $qrModel->insert(['id_mascota' => $id, 'telefono' => $telPost, 'notas' => $notasPost]);
        }

        return redirect()->to('/mascotas')->with('mensaje', '¡Datos actualizados correctamente!');
    }

    // 6. PERFIL DE LA MASCOTA
    public function ver($id)
    {
        $model = new MascotaModel();
        $qrModel = new InfoQRModel();
        $userId = session()->get('id_usuario');

        $data['mascota'] = $model->where(['id_mascota' => $id, 'id_usuario' => $userId])->first();
        
        if (!$data['mascota']) {
            return redirect()->to('/mascotas')->with('error', 'Acceso denegado.');
        }

        $data['info_qr'] = $qrModel->where('id_mascota', $id)->first();
        return view('mascotas/ver', $data);
    }
    

    public function carnet($id)
    {
        $model = new MascotaModel();
        $userId = session()->get('id_usuario');

        // Validamos que la mascota exista y pertenezca al usuario logueado
        $mascota = $model->where(['id_mascota' => $id, 'id_usuario' => $userId])->first();
        
        if (!$mascota) {
            return redirect()->to('/mascotas')->with('error', 'Mascota no encontrada o acceso denegado.');
        }

        // Pasamos los datos a la vista 'carnet_pdf.php'
        $data['m'] = $mascota; 
        return view('mascotas/carnet_pdf', $data);
    }
}
