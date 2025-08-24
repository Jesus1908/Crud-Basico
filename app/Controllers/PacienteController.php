<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Libro;
use App\Models\Paciente;

class PacienteController extends BaseController
{

  public function index(): string
  {
    $paciente = new Paciente();

    $datos['pacientes'] = $paciente->orderBy('idpaciente', 'ASC')->findAll();

    return view('pacientes/listar', $datos);
  }
}