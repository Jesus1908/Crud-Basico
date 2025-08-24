<?php

namespace App\Models;
use CodeIgniter\Model;

class Paciente extends Model{

  protected $table = 'pacientes';
  protected $primaryKey = "idpaciente";
  protected $allowedFields = ["nombre", "dni", "correo", "expediente"];

}