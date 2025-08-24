<?= $header; ?>

<div class="container mt-2">
  <div class="my-2">
    <h4 class="text-center">Editar Enfermedad</h4>
  </div>

  <form method="POST" action="<?= base_url('enfermedades/actualizar') ?>">
    <div class="card shadow-sm">
      <div class="card-body">

        <!-- ID oculto -->
        <input type="hidden" name="idenfermedad" value="<?= $enfermedad['idenfermedad']; ?>">

        <!-- Relación con paciente -->
        <div class="mb-3">
          <label for="id_paciente" class="form-label">Paciente</label>
          <select class="form-select" name="id_paciente" id="id_paciente" required>
            <option value="" disabled>Seleccione un paciente</option>
            <?php foreach($pacientes as $paciente): ?>
              <option value="<?= $paciente['idpaciente']; ?>"
                <?= ($paciente['idpaciente'] == $enfermedad['id_paciente']) ? 'selected' : ''; ?>>
                <?= $paciente['nombre']; ?> (DNI: <?= $paciente['dni']; ?>)
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Nombre de la enfermedad -->
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre de la enfermedad</label>
          <input type="text" class="form-control" name="nombre" id="nombre"
            value="<?= $enfermedad['nombre']; ?>"
            required minlength="3" maxlength="100" placeholder="Ej: Diabetes tipo 2">
        </div>

        <!-- Descripción -->
        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripción</label>
          <textarea class="form-control" name="descripcion" id="descripcion" rows="3"
            placeholder="Detalles, síntomas, observaciones..." required><?= $enfermedad['descripcion']; ?></textarea>
        </div>

      </div>
      <div class="card-footer text-end">
        <a href="<?= base_url('enfermedades') ?>" class="btn btn-sm btn-outline-secondary">Cancelar</a>
        <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
      </div>
    </div>
  </form>
</div>

<?= $footer; ?>
