<?= $this->extend('layouts/main') ?>

<?= $this->section('titulo') ?>Añadir Mascota<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-custom p-4">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-violeta-claro p-3 rounded-circle me-3" style="background: var(--violeta-claro); color: var(--violeta-principal);">
                    <i class="fas fa-dog fa-2x"></i>
                </div>
                <h2 class="fw-bold m-0">Registrar Nueva Mascota</h2>
            </div>

            <form action="<?= base_url('mascotas/guardar') ?>" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-600">Nombre de la Mascota</label>
                        <input type="text" name="nombre" class="form-control form-control-lg"  required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-600">Especie</label>
                        <select name="especie" class="form-select form-control-lg">
                            <option value="Perro">Perro</option>
                            <option value="Gato">Gato</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-600">Raza</label>
                        <input type="text" name="raza" class="form-control" placeholder="Labrador">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-600">Sexo</label>
                        <select name="sexo" class="form-select">
                            <option value="Macho">Macho</option>
                            <option value="Hembra">Hembra</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-600">Peso (kg)</label>
                        <input type="number" step="0.1" name="peso" class="form-control" placeholder="0.0">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-600">Observaciones Médicas / Notas</label>
                    <textarea name="observaciones" class="form-control" rows="3" placeholder="Información relevante para su cuidado..."></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('mascotas') ?>" class="btn btn-light px-4">Cancelar</a>
                    <button type="submit" class="btn btn-violeta px-5 py-2 shadow">Guardar Mascota</button>
                </div>

            </form>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>