<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Paciente;

class PacienteController extends BaseController
{
  
  //Listar pacientes
  public function index(): string
  {
    $paciente = new Paciente();
    $datos['pacientes'] = $paciente->orderBy('idpaciente', 'ASC')->findAll();
  
    $datos['header'] = view('Layouts/header');
    $datos['footer'] = view('Layouts/footer');

    return view('pacientes/listar', $datos);
  }

  //Crear pacientes
    public function crear(): string
  {
    $datos['header'] = view('Layouts/header');
    $datos['footer'] = view('Layouts/footer');

    return view('pacientes/crear', $datos);
  }

  //Guardar paciientes
  public function guardar() {
    $paciente = new Paciente();

    $nombre = $this->request->getVar('nombre'); 
    $dni = $this->request->getVar('dni'); 
    $correo = $this->request->getVar('correo'); 
    
    if ($expediente = $this->request->getFile('expediente')){
      $nuevoNombre = $expediente->getRandomName();
      $expediente->move('../public/uploads/', $nuevoNombre);

      $registro = [
        'nombre'    => $nombre,
        'dni'    => $dni,
        'correo'    => $correo,
        'expediente'    => $nuevoNombre
      ];
      $paciente->insert($registro);
      return $this->response->redirect(base_url('pacientes'));
    }
  }
  //Actualizar pacientes
    public function editar($id = null)
  {
    $paciente = new Paciente();

    $datos['header'] = view('Layouts/header');
    $datos['footer'] = view('Layouts/footer');
    $result = $paciente->where('idpaciente', $id)->first();

    if (!$result){ 
      return $this->response->redirect(base_url('pacientes'));
    }else{
      $datos['paciente'] = $result;
      return view('pacientes/editar', $datos);
    }
  }


}