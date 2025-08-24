<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Enfermedad;
use App\Models\Paciente;

class EnfermedadController extends BaseController
{
    // Listar enfermedades
    public function index(): string
    {
        $enfermedad = new Enfermedad();
        $datos['enfermedades'] = $enfermedad
            ->select('enfermedades.*, pacientes.nombre as paciente_nombre, pacientes.dni as paciente_dni')
            ->join('pacientes', 'pacientes.idpaciente = enfermedades.id_paciente')
            ->orderBy('idenfermedad', 'ASC')
            ->findAll();

        $datos['header'] = view('Layouts/header');
        $datos['footer'] = view('Layouts/footer');

        return view('enfermedades/listar', $datos);
    }

    public function crear(): string
    {
        $pacienteModel = new Paciente();
        $datos['pacientes'] = $pacienteModel->findAll(); 

        $datos['header'] = view('Layouts/header');
        $datos['footer'] = view('Layouts/footer');

        return view('enfermedades/crear', $datos);
    }

    // Guardar enfermedad
    public function guardar()
    {
        $enfermedad = new Enfermedad();

        $registro = [
            'id_paciente' => $this->request->getVar('id_paciente'),
            'nombre'      => $this->request->getVar('nombre'),
            'descripcion' => $this->request->getVar('descripcion')
        ];

        $enfermedad->insert($registro);

        return $this->response->redirect(base_url('enfermedades'));
    }

    // Editar enfermedad
    public function editar($id = null)
    {
        $enfermedad = new Enfermedad();
        $pacienteModel = new Paciente();

        $datos['enfermedad'] = $enfermedad->where('idenfermedad', $id)->first();
        $datos['pacientes'] = $pacienteModel->findAll();

        if (!$datos['enfermedad']) {
            return $this->response->redirect(base_url('enfermedades'));
        }

        $datos['header'] = view('Layouts/header');
        $datos['footer'] = view('Layouts/footer');

        return view('enfermedades/editar', $datos);
    }

    // Actualizar enfermedad
    public function actualizar()
    {
        $enfermedad = new Enfermedad();

        $id = $this->request->getVar('idenfermedad');

        $datos = [
            'id_paciente' => $this->request->getVar('id_paciente'),
            'nombre'      => $this->request->getVar('nombre'),
            'descripcion' => $this->request->getVar('descripcion')
        ];

        $enfermedad->update($id, $datos);

        return $this->response->redirect(base_url('enfermedades'));
    }

    // Eliminar enfermedad
    public function borrar($id = null)
    {
        $enfermedad = new Enfermedad();

        $enfermedad->delete($id);

        return $this->response->redirect(base_url('enfermedades'));
    }
}
