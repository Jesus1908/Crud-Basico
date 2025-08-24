<?= $header; ?>

<div class="container mt-4">
  <!-- Título -->
  <div class="mb-3">
    <h3 class="fw-bold text-primary text-center mb-4  border-bottom pb-2">
      Lista de Pacientes
    </h3>
  </div>

  <!-- Tabla -->
  <div class="table-responsive shadow-sm rounded">
    <table class="table table-striped table-hover align-middle">
      <colgroup>
        <col width="5%">
        <col width="20%">
        <col width="10%">
        <col width="20%">
        <col width="15%">
        <col width="20%">
      </colgroup>
      <thead class="table-primary text-center">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>DNI</th>
          <th>Correo</th>
          <th>Expediente</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php foreach($pacientes as $paciente): ?>
        <tr>
          <td><?= $paciente['idpaciente'] ?></td>
          <td><?= $paciente['nombre'] ?></td>
          <td><?= $paciente['dni'] ?></td>
          <td><?= $paciente['correo'] ?></td>
          <td>
            <img src="<?= base_url("uploads/") ?><?= $paciente['expediente'] ?>" 
                 alt="Expediente" 
                 class="img-thumbnail"
                 style="width: 100px; height: auto;">
          </td>
          <td>
            <a href="<?= base_url('pacientes/editar/') ?><?= $paciente['idpaciente'] ?>" 
               class="btn btn-sm btn-warning me-1">
              Editar
            </a>
            <a href="<?= base_url('pacientes/borrar/') ?><?= $paciente['idpaciente'] ?>" 
               class="btn btn-sm btn-danger" 
               onclick="return confirm('¿Seguro que deseas eliminar este paciente?');">
              Eliminar
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

<!-- Botón registrar -->
<div class="mt-3 text-center">
  <a href="<?= base_url("pacientes/crear"); ?>" class="btn btn-success">
    Registrar Paciente
  </a>
</div>

<?= $footer; ?>
