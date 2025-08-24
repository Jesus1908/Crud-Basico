<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Rutas pacientes
$routes->get('/pacientes', 'PacienteController::index');
$routes->get('/pacientes/crear', 'PacienteController::crear'); 