<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clínica</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center fw-bold" href="<?= base_url(); ?>">
        <img src="https://cdn-icons-png.flaticon.com/512/2966/2966488.png" alt="Logo Clínica" width="32" height="32" class="me-2">
        Clínica nueva salud
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menú -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?= (current_url() == base_url()) ? 'active fw-semibold' : '' ?>" href="<?= base_url(); ?>">🏠 Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (strpos(current_url(), 'pacientes') !== false) ? 'active fw-semibold' : '' ?>" href="<?= base_url('pacientes'); ?>">👨‍⚕️ Pacientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (strpos(current_url(), 'enfermedades') !== false) ? 'active fw-semibold' : '' ?>" href="<?= base_url('enfermedades'); ?>">📋 Enfermedades</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container my-4">
