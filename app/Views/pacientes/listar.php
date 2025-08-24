<?= $header; ?>

<div class="container mt-2">
  <div class="my-2">
    <h4>Lista de pacientes</h4>
    <a href="<?= base_url("pacientes/crear"); ?>">Registrar</a>
  </div>

  <div class="table-resposive">
    <table class="table table-sm">
      <colgroup>
        <col width="15%">
        <col width="20%">
        <col width="30%">
        <col width="20%">
        <col width="15%">
      </colgroup>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Dni</th>
          <th>Correo</th>
          <th>Expediente</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach($pacientes as $paciente): ?>

        <tr class="align-middle">
          <td><?= $paciente['idpaciente'] ?></td>
          <td><?= $paciente['nombre'] ?></td>
          <td>
            <img src="<?= base_url("uploads/") ?><?= $libro['imagen'] ?>" alt="Expediente" class="img-thumbnail" style="width: 120px">
          </td>
          <td>
            <a href="<?= base_url('pacientes/borrar/') ?><?= $libro['idpaciente'] ?>" class="btn btn-sm btn-danger">Eliminar</a>
            <a href="<?= base_url('pacientes/editar/') ?><?= $libro['idpaciente'] ?>" class="btn btn-sm btn-info">Editar</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>

<?= $footer; ?>