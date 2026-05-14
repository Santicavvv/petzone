<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetZone | Identificación de <?= ($info['nombre_visible']) ? esc($m['nombre']) : 'Mascota' ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { background-color: #f3effb; font-family: 'Poppins', sans-serif; color: #2d3436; }
        .profile-card { background: white; border-radius: 30px; box-shadow: 0 10px 30px rgba(111, 66, 193, 0.1); margin-top: 20px; overflow: hidden; border: none; }
        .status-badge { background-color: #ff4757; color: white; padding: 6px 20px; border-radius: 50px; font-weight: 700; font-size: 0.8rem; margin-bottom: 15px; display: inline-block; }
        .pet-icon { font-size: 70px; color: #6f42c1; margin-bottom: 15px; }
        .btn-contact { border-radius: 15px; padding: 15px; font-weight: 700; margin-bottom: 12px; display: flex; align-items: center; justify-content: center; gap: 10px; text-decoration: none; transition: 0.3s; border: none; }
        .btn-whatsapp { background-color: #25d366; color: white; }
        .btn-call { background-color: #6f42c1; color: white; }
        .alert-salud { border-radius: 20px; background-color: #fffdec; border-left: 5px solid #ffc107 !important; }
    </style>
</head>
<body>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="profile-card p-4 p-md-5">
                
                <div class="status-badge"><i class="fas fa-shield-dog me-2"></i> MASCOTA REGISTRADA</div>
                
                <div class="pet-icon">
                    <i class="fas <?= ($m['especie'] == 'Gato') ? 'fa-cat' : 'fa-dog' ?>"></i>
                </div>

                <h1 class="fw-bold">
                    <?= ($info['nombre_visible']) ? esc($m['nombre']) : '¡Hola! Me encontraste' ?>
                </h1>
                
                <p class="text-muted mb-4">
                    <?= esc($m['especie']) ?> • <?= esc($m['raza']) ?> • <?= esc($m['sexo']) ?>
                </p>
                
                <hr class="my-4" style="opacity: 0.1;">

                <?php if (!empty($m['observaciones'])): ?>
                    <div class="card border-0 mb-4 shadow-sm alert-salud text-start">
                        <div class="card-body p-4">
                            <h6 class="fw-bold text-dark mb-2" style="display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-exclamation-triangle text-warning" style="font-size: 1.2rem;"></i> 
                                NOTAS DE CUIDADO Y SALUD
                            </h6>
                            <p class="mb-0 text-dark" style="white-space: pre-line; line-height: 1.6; font-size: 0.95rem;">
                                <?= esc($m['observaciones']) ?>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($info['telefono_visible'] && !empty($dueno['telefono'])): ?>
                    <p class="fw-bold mb-3">Por favor, avisa a mi familia:</p>
                    
                    <?php $tel_limpio = preg_replace('/[^0-9]/', '', $dueno['telefono']); ?>

                    <a href="https://wa.me/<?= $tel_limpio ?>?text=Hola! Encontré a tu mascota <?= ($info['nombre_visible']) ? esc($m['nombre']) : '' ?>" class="btn btn-contact btn-whatsapp w-100">
                        <i class="fab fa-whatsapp fa-lg"></i> Enviar WhatsApp
                    </a>

                    <a href="tel:<?= $tel_limpio ?>" class="btn btn-contact btn-call w-100">
                        <i class="fas fa-phone-alt"></i> Llamar al Dueño
                    </a>
                <?php else: ?>
                    <div class="alert alert-light border shadow-sm small py-3">
                        <i class="fas fa-lock me-2 text-muted"></i> El dueño eligió mantener sus datos de contacto privados.
                    </div>
                <?php endif; ?>

                <?php if (!empty($info['telefono_alternativo'])): ?>
                    <div class="mt-4 pt-2">
                        <p class="small text-uppercase fw-bold text-muted mb-2">Contacto de Emergencia Auxiliar</p>
                        <a href="tel:<?= preg_replace('/[^0-9]/', '', $info['telefono_alternativo']) ?>" class="btn btn-outline-secondary w-100 rounded-pill fw-bold">
                            <i class="fas fa-user me-2"></i> Llamar a <?= esc($info['nombre_alternativo'] ?: 'Contacto Secundario') ?>
                        </a>
                    </div>
                <?php endif; ?>

                <div class="mt-5">
                    <p class="text-muted mb-0" style="font-size: 0.75rem;">Protegido por</p>
                    <h6 class="fw-bold" style="color: #6f42c1;"><i class="fas fa-paw"></i> PetZone</h6>
                </div>
            </div>
            
            <a href="<?= base_url('/') ?>" class="btn btn-link mt-3 text-muted text-decoration-none small">
                <i class="fas fa-chevron-left me-1"></i> Volver a la página principal
            </a>
        </div>
    </div>
</div>

</body>
</html>