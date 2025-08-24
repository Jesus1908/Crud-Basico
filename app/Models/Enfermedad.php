<?php

namespace App\Models;
use CodeIgniter\Model;

class Enfermedad extends Model{

  protected $table = 'enfermedades';
  protected $primaryKey = "idenfermedad";
  protected $allowedFields = ["id_paciente", "nombre", "descripcion"];
}