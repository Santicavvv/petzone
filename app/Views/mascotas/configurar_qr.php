<?= $this->extend('layouts/main') ?>

<?= $this->section('titulo') ?>Privacidad QR<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-custom p-4 border-start border-4 border-primary">
            <div class="text-center mb-4">
                <div class="display-6 text-primary"><i class="fas fa-user-shield"></i></div>
                <h2 class="fw-bold">Privacidad del Perfil QR</h2>
                <p class="text-muted">Controla qué información se muestra cuando alguien escanea el collar de <strong><?= esc($mascota['nombre']) ?></strong></p>
            </div>

            <form action="<?= base_url('mascotas/guardar_qr') ?>" method="post">
                <input type="hidden" name="id_mascota" value="<?= $mascota['id_mascota'] ?>">

                <div class="list-group mb-4 shadow-sm">
                    <label class="list-group-item d-flex gap-3 py-3">
                        <input class="form-check-input flex-shrink-0" type="checkbox" name="nombre_visible" value="1" <?= ($info['nombre_visible'] ?? 1) ? 'checked' : '' ?> style="font-size: 1.375em;">
                        <span>
                            <strong>Mostrar nombre de la mascota</strong>
                            <small class="d-block text-muted">Permite que quien la encuentre sepa cómo llamarla.</small>
                        </span>
                    </label>
                    <label class="list-group-item d-flex gap-3 py-3">
                        <input class="form-check-input flex-shrink-0" type="checkbox" name="telefono_visible" value="1" <?= ($info['telefono_visible'] ?? 1) ? 'checked' : '' ?> style="font-size: 1.375em;">
                        <span>
                            <strong>Mostrar mi teléfono de contacto</strong>
                            <small class="d-block text-muted">Su número principal para recibir llamadas o WhatsApp.</small>
                        </span>
                    </label>
                    <label class="list-group-item d-flex gap-3 py-3">
                        <input class="form-check-input flex-shrink-0" type="checkbox" name="direccion_visible" value="1" <?= ($info['direccion_visible'] ?? 0) ? 'checked' : '' ?> style="font-size: 1.375em;">
                        <span>
                            <strong>Mostrar mi dirección</strong>
                            <small class="d-block text-muted">Recomendado solo si la mascota no se aleja mucho de casa.</small>
                        </span>
                    </label>
                </div>

                <h5 class="fw-bold mb-3"><i class="fas fa-phone-alt me-2 text-primary"></i>Contacto de Emergencia Auxiliar</h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <input type="text" name="nombre_alternativo" class="form-control" placeholder="Nombre (ej: Familiar)" value="<?= $info['nombre_alternativo'] ?? '' ?>">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="telefono_alternativo" class="form-control" placeholder="Teléfono secundario" value="<?= $info['telefono_alternativo'] ?? '' ?>">
                    </div>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold mb-3"><i class="fas fa-notes-medical me-2 text-danger"></i>Mensaje de Auxilio / Datos Médicos</h5>
                    <textarea name="mensaje_auxilio" class="form-control" rows="3" placeholder="Ej: Es diabético y necesita medicación cada 8 horas."><?= $info['mensaje_auxilio'] ?? '' ?></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('mascotas') ?>" class="btn btn-light">Cancelar</a>
                    <button type="submit" class="btn btn-violeta px-5 shadow">Guardar Cambios de Privacidad</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>