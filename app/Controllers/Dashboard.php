<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        
        // Verificamos si el usuario está logueado
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('auth/login'));
        }

        return view('dashboard/index', ['nombre' => $session->get('nombre')]);
    }
}