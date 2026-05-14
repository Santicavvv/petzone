<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control | PetZone</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <style>
        :root { --violeta: #6f42c1; --violeta-claro: #f3effb; }
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .text-violeta { color: var(--violeta); }
        .btn-violeta { background: var(--violeta); color: white; border-radius: 50px; }
        .btn-violeta:hover { background: #5a32a3; color: white; }
        
        .card-custom { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        
        /* Estilo para los items de la lista de mascotas */
        .pet-item {
            transition: all 0.3s ease;
            border: 1px solid #eee;
        }
        .pet-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-color: var(--violeta);
        }

        #map { 
            height: 500px; 
            width: 100%; 
            border-radius: 15px; 
            z-index: 1;
        }

        .btn-action-circle {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            padding: 0;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: var(--violeta);">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= base_url('/') ?>">
            <i class="fas fa-paw"></i> PetZone
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-warning fw-bold" href="<?= base_url('logout') ?>">
                        <i class="fas fa-sign-out-alt"></i> Salir
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid py-4 px-5">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card card-custom p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0 text-violeta">Tus Dispositivos</h5>
                    <a href="<?= base_url('mascotas/crear') ?>" class="btn btn-sm btn-violeta p-2 px-3">
                        <i class="fas fa-plus"></i> Añadir
                    </a>
                </div>
                
                <div class="overflow-auto" style="max-height: 600px;">
                    <?php if(!empty($mascotas)): ?>
                        <?php foreach($mascotas as $m): ?>
                        <div class="pet-item d-flex align-items-center p-3 mb-3 bg-white rounded-4">
                            <div class="position-relative">
                                <img src="<?= base_url('uploads/mascotas/'.($m['foto'] ?? 'default.png')) ?>" 
                                     class="rounded-circle border border-2 border-violeta" 
                                     width="65" height="65" style="object-fit: cover;">
                                <span class="position-absolute bottom-0 end-0 badge border border-light rounded-circle bg-success p-1" style="width: 15px; height: 15px;"></span>
                            </div>

                            <div class="ms-3 flex-grow-1">
                                <h6 class="mb-0 fw-bold"><?= esc($m['nombre']) ?></h6>
                                <small class="text-muted d-block small"><?= esc($m['raza'] ?? 'Mascota') ?></small>
                                <span class="badge bg-light text-dark border mt-1 fw-normal" style="font-size: 0.7rem;">ID: #<?= $m['id_mascota'] ?></span>
                            </div>

                            <div class="d-flex flex-column gap-2">
                                <a href="<?= base_url('mascotas/ver/'.$m['id_mascota']) ?>" 
                                   class="btn btn-outline-primary btn-action-circle" 
                                   title="Vista Pública">
                                    <i class="fas fa-eye fa-xs"></i>
                                </a>
                                
                                <a href="<?= base_url('mascotas/editar/'.$m['id_mascota']) ?>" 
                                   class="btn btn-outline-secondary btn-action-circle" 
                                   title="Editar">
                                    <i class="fas fa-pen fa-xs"></i>
                                </a>

                                <a href="<?= base_url('mascotas/carnet/'.$m['id_mascota']) ?>" 
                                   class="btn btn-outline-dark btn-action-circle" 
                                   title="Ver Código QR Único">
                                    <i class="fas fa-qrcode fa-xs"></i>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center py-5">
                            <i class="fas fa-paw fa-3x text-light mb-3"></i>
                            <p class="text-muted">No hay mascotas registradas.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mb-4">
            <div class="card card-custom p-3 h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Ubicación en Tiempo Real</h5>
                    <div class="badge bg-violeta-claro text-violeta p-2 px-3 rounded-pill">
                        <i class="fas fa-satellite-dish me-1"></i> Recibiendo datos
                    </div>
                </div>
                
                <div id="map"></div>
                
                <div class="mt-3 row text-center">
                    <div class="col-4 border-end">
                        <small class="text-muted d-block">Última actualización</small>
                        <span class="fw-bold">Hace 15 seg.</span>
                    </div>
                    <div class="col-4 border-end">
                        <small class="text-muted d-block">Dispositivos</small>
                        <span class="fw-bold"><?= count($mascotas ?? []) ?> Activos</span>
                    </div>
                    <div class="col-4">
                        <small class="text-muted d-block">Precisión GPS</small>
                        <span class="text-success fw-bold">Alta</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Configuración inicial del mapa centrada en Argentina/Córdoba como ejemplo
    var map = L.map('map').setView([-32.1745, -64.1132], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© PetZone'
    }).addTo(map);

    // Iterar mascotas para poner marcadores
    <?php if(!empty($mascotas)): ?>
        <?php foreach($mascotas as $m): ?>
            L.marker([-32.1745, -64.1132]).addTo(map)
                .bindPopup("<b><?= esc($m['nombre']) ?></b><br>Estado: Protegido");
        <?php endforeach; ?>
    <?php endif; ?>
</script>

</body>
</html>