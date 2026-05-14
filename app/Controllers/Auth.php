<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Auth extends BaseController
{
    /**
     * Muestra la vista de inicio de sesión
     */
    public function login()
    {
        // Si ya está logueado, lo mandamos al dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('dashboard'));
        }
        return view('auth/login');
    }

    /**
     * Procesa el formulario de inicio de sesión
     */
    public function loginPost()
    {
        $session = session();
        $model = new UsuarioModel();
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Buscamos el usuario por su correo
        $user = $model->where('email', $email)->first();

        if ($user) {
            // Verificamos si la contraseña coincide con el hash en la BD
            if (password_verify($password, $user['contrasena'])) {
                $sessionData = [
                    'id_usuario' => $user['id_usuario'],
                    'nombre'     => $user['nombre'],
                    'apellido'   => $user['apellido'],
                    'email'      => $user['email'],
                    'isLoggedIn' => true
                ];
                $session->set($sessionData);
                return redirect()->to(base_url('dashboard'));
            } else {
                return redirect()->back()->with('err', 'La contraseña es incorrecta.');
            }
        } else {
            return redirect()->back()->with('err', 'El correo electrónico no está registrado.');
        }
    }

    /**
     * Muestra la vista de registro
     */
    public function registro()
    {
        return view('auth/registro');
    }

    /**
     * Procesa el formulario de registro de nuevos usuarios
     */
    public function registroPost()
    {
        $model = new UsuarioModel();

        // Recolectamos los datos del formulario
        $data = [
            'nombre'     => $this->request->getPost('nombre'),
            'apellido'   => $this->request->getPost('apellido'),
            'email'      => $this->request->getPost('email'),
            'telefono'   => $this->request->getPost('telefono'),
            // Encriptamos la contraseña por seguridad
            'contrasena' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        // Intentamos insertar el nuevo usuario
        try {
            $model->insert($data);
            return redirect()->to(base_url('auth/login'))->with('msg', '¡Cuenta creada con éxito! Ya puedes iniciar sesión.');
        } catch (\Exception $e) {
            // Si hay un error (ej: email duplicado) regresamos con el mensaje
            return redirect()->back()->withInput()->with('err', 'Hubo un error al registrar: ' . $e->getMessage());
        }
    }

    /**
     * Cierra la sesión del usuario
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth/login'));
    }
}