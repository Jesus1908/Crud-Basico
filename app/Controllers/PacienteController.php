<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Paciente;

class PacienteController extends BaseController
{

  public function index(): string
  {
    $paciente = new Paciente();
    $datos['pacientes'] = $paciente->orderBy('idpaciente', 'ASC')->findAll();
  
    $datos['header'] = view('Layouts/header');
    $datos['footer'] = view('Layouts/footer');

    return view('pacientes/listar', $datos);
  }

    public function crear(): string
  {
    $datos['header'] = view('Layouts/header');
    $datos['footer'] = view('Layouts/footer');

    return view('pacientes/crear', $datos);
  }
}