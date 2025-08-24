<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Rutas pacientes
$routes->get('/pacientes', 'PacienteController::index');
$routes->get('/pacientes/crear', 'PacienteController::crear'); 
$routes->get('/pacientes/borrar/(:num)', 'PacienteController::borrar/$1');
$routes->get('/pacientes/editar/(:num)', 'PacienteController::editar/$1');

$routes->post('/pacientes/guardar', 'PacienteController::guardar');
$routes->post('/pacientes/actualizar', 'PacienteController::actualizar');

//Rutas enfermedades
$routes->get('/enfermedades', 'EnfermedadController::index');
$routes->get('/enfermedades/crear', 'EnfermedadController::crear'); 
$routes->get('/enfermedades/borrar/(:num)', 'EnfermedadController::borrar/$1');
$routes->get('/enfermedades/editar/(:num)', 'EnfermedadController::editar/$1');

$routes->post('/enfermedades/guardar', 'EnfermedadController::guardar');
$routes->post('/enfermedades/actualizar', 'EnfermedadController::actualizar');