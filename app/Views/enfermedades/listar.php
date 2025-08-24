<?= $header; ?>

<div class="container mt-4">
  <!-- Título -->
  <div class="mb-3">
    <h3 class="fw-bold text-primary text-center mb-4  border-bottom pb-2">
      Lista de Enfermedades
    </h3>
  </div>

  <!-- Tabla -->
  <div class="table-responsive shadow-sm rounded">
    <table class="table table-striped table-hover align-middle">
      <colgroup>
        <col width="20%">
        <col width="20%">
        <col width="20%">
        <col width="20%">
        <col width="20%">
      </colgroup>
      <thead class="table-primary text-center">
        <tr>
          <th>ID</th>
          <th>Paciente</th>
          <th>Enfermedad</th>
          <th>Descripción</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php foreach($enfermedades as $enfermedad): ?>
        <tr>
          <td><?= $enfermedad['idenfermedad'] ?></td>
          <td><?= $enfermedad['id_paciente'] ?></td>
          <td><?= $enfermedad['nombre'] ?></td>
          <td><?= $enfermedad['descripcion'] ?></td>
          <td>
            <a href="<?= base_url('enfermedades/editar/') ?><?= $enfermedad['idenfermedad'] ?>" 
               class="btn btn-sm btn-warning me-1">
              Editar
            </a>
            <a href="<?= base_url('enfermedades/borrar/') ?><?= $enfermedad['idenfermedad'] ?>" 
               class="btn btn-sm btn-danger" 
               onclick="return confirm('¿Seguro que deseas eliminar esta enfermedad?');">
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
  <a href="<?= base_url("enfermedades/crear"); ?>" class="btn btn-success">
    Registrar enfermedad
  </a>
</div>

<?= $footer; ?>
