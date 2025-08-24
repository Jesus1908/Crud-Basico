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

  public function actualizar(){
      $paciente = new Paciente();

      $datos = [
          'nombre' => $this->request->getVar('nombre'),
          'dni'    => $this->request->getVar('dni'),
          'correo' => $this->request->getVar('correo') 
      ];

      $idpaciente = $this->request->getVar('idpaciente'); 

      // Primero actualizamos datos básicos
      $paciente->update($idpaciente, $datos);

      // Verificamos si se subió un expediente nuevo
      $expediente = $this->request->getFile('expediente');
      if ($expediente && $expediente->isValid() && !$expediente->hasMoved()) {
          
          // Validamos SOLO si hay archivo
          $validacion = $this->validate([
              'expediente' => [
                  'mime_in[expediente,image/png,image/jpg,image/jpeg,application/pdf]',
                  'max_size[expediente,1024]'
              ]
          ]);

          if ($validacion) {
              //1. Obtener el expediente anterior
              $datosPaciente = $paciente->where('idpaciente', $idpaciente)->first(); 
              $rutaExpediente = '../public/uploads/' . $datosPaciente['expediente'];

              //2. Eliminar si existe
              if (!empty($datosPaciente['expediente']) && file_exists($rutaExpediente)) {
                  unlink($rutaExpediente);
              }

              //3. Guardar nuevo expediente
              $nuevoNombre = $expediente->getRandomName();
              $expediente->move('../public/uploads/', $nuevoNombre);

              //4. Actualizar en BD
              $paciente->update($idpaciente, ["expediente" => $nuevoNombre]);
          }
      }

      return $this->response->redirect(base_url('pacientes'));
  }


  //Eliminar paciente
  public function borrar($idpaciente= null){
    $paciente = new Paciente();

    $datosPaciente = $paciente->where('idpaciente', $idpaciente)->first();
    $rutaExpediente = '../public/uploads/' . $datosPaciente['expediente'];

    if (file_exists($rutaExpediente)){ unlink($rutaExpediente); }

    $paciente->where('idpaciente', $idpaciente)->delete($idpaciente);

    return $this->response->redirect(base_url('pacientes'));
  }
}