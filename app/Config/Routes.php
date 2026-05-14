<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- RUTA POR DEFECTO ---
$routes->get('/', 'Home::index');

// --- AUTENTICACIÓN ---
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/login', 'Auth::loginPost');
$routes->get('auth/registro', 'Auth::registro');
$routes->post('auth/registroPost', 'Auth::registroPost');
$routes->get('auth/logout', 'Auth::logout');

// --- DASHBOARD GENERAL ---
$routes->get('dashboard', 'Dashboard::index');

// --- GESTIÓN DE MASCOTAS ---
$routes->get('mascotas', 'Mascotas::index');
$routes->get('mascotas/crear', 'Mascotas::crear');
$routes->post('mascotas/guardar', 'Mascotas::guardar');
$routes->get('mascotas/ver/(:num)', 'Mascotas::ver/$1');
$routes->get('mascotas/editar/(:num)', 'Mascotas::editar/$1');
$routes->post('mascotas/actualizar', 'Mascotas::actualizar');

// --- RUTA DEL CARNET / QR (Añade esta línea para quitar el 404) ---
$routes->get('mascotas/carnet/(:num)', 'Mascotas::carnet/$1');

// Perfil público (Escaneo de QR)
$routes->get('p/(:num)', 'Mascotas::perfil_publico/$1');

// --- CONFIGURACIÓN DE PRIVACIDAD / QR ---
$routes->get('mascotas/configurar_qr/(:num)', 'Mascotas::configurar_qr/$1');
$routes->post('mascotas/guardar_qr', 'Mascotas::guardar_qr');