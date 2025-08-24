<?= $header; ?>

<div class="container mt-2">
  <div class="my-2">
    <h4>Editar Paciente</h4>
    <a href="<?= base_url("pacientes"); ?>">Volver</a>
  </div>

  <form method="POST" action="<?= base_url('pacientes/actualizar') ?>" enctype="multipart/form-data">

    <input type="hidden" name="idpaciente" value="<?= $paciente['idpaciente'] ?>">

    <div class="card">
      <div class="card-body">

        <div class="mb-3">
          <label for="nombre">Nombre del paciente</label>
          <input type="text" class="form-control" name="nombre" id="nombre"  value="<?= $paciente['nombre'] ?>"  autofocus required minlength="3" maxlength="100">
        </div>

        <div class="mb-3">
          <label for="dni">DNI</label>
          <input type="text" class="form-control" name="dni" id="dni" value="<?= $paciente['dni'] ?>"  required pattern="[0-8]{7}" title="El DNI debe contener 7 números">
        </div>

        <div class="mb-3">
          <label for="correo">Correo</label>
          <input type="email" class="form-control" name="correo" id="correo"  value="<?= $paciente['correo'] ?>" required>
        </div>

        <div class="my-3">
          <label for="">Imagen actual</label>
          <img src="<?= base_url("uploads/") ?><?= $paciente['expediente'] ?>" alt="Expediente" class="img-fluid" style="max-width: 480px">
        </div>
        <div class="mb-3">
          <label for="expediente">Adjuntar expediente</label>
          <input type="file" class="form-control" name="expediente" id="expediente" accept=".pdf,.jpg,.png">
        </div>

      </div>
      <div class="card-footer text-end">
        <a href="<?= base_url('pacientes') ?>" class="btn btn-sm btn-outline-secondary">Cancelar</a>
        <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
      </div>
    </div>
  </form>
</div>
