<?= $header; ?>

<div class="container mt-2">
  <div class="my-2">
    <h4>Registro de Paciente</h4>
    <a href="<?= base_url("pacientes"); ?>">Volver</a>
  </div>

  <form method="POST" action="<?= base_url('pacientes/guardar') ?>" enctype="multipart/form-data">
    <div class="card">
      <div class="card-body">

        <div class="mb-3">
          <label for="nombre">Nombre del paciente</label>
          <input type="text" class="form-control" name="nombre" id="nombre" autofocus required minlength="3" maxlength="100">
        </div>

        <div class="mb-3">
          <label for="dni">DNI</label>
          <input type="text" class="form-control" name="dni" id="dni" required pattern="[0-8]{7}" title="El DNI debe contener 7 números">
        </div>

        <div class="mb-3">
          <label for="correo">Correo</label>
          <input type="email" class="form-control" name="correo" id="correo" required>
        </div>

        <div class="mb-3">
          <label for="expediente">Adjuntar expediente</label>
          <input type="file" class="form-control" name="expediente" id="expediente" accept=".pdf,.jpg,.png">
        </div>

      </div>
      <div class="card-footer text-end">
        <button type="reset" class="btn btn-sm btn-outline-secondary">Cancelar</button>
        <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
      </div>
    </div>
  </form>
</div>
