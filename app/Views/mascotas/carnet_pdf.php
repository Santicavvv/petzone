<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carnet PetZone - <?= esc($m['nombre']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { background: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .carnet-card {
            width: 450px;
            height: 250px;
            background: white;
            border-radius: 20px;
            border: 2px solid #6f42c1;
            margin: 50px auto;
            padding: 25px;
            display: flex;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .qr-section { 
            width: 40%; 
            display: flex; 
            flex-direction: column;
            align-items: center; 
            justify-content: center; 
            border-right: 1px solid #eee; 
            padding-right: 20px; 
        }
        .info-section { width: 60%; padding-left: 20px; text-align: left; }
        .logo-text { color: #6f42c1; font-weight: bold; font-size: 0.8rem; margin-bottom: 5px; letter-spacing: 1px; }
        .pet-name { font-size: 1.8rem; font-weight: bold; color: #333; margin-bottom: 0; line-height: 1.2; }
        .text-violeta { color: #6f42c1; }
        
        @media print { 
            .no-print { display: none !important; } 
            body { background: white; } 
            .carnet-card { margin: 0; box-shadow: none; border: 1px solid #6f42c1; } 
        }
    </style>
</head>
<body>

    <div class="no-print mt-4 text-center">
        <a href="<?= base_url('mascotas') ?>" class="btn btn-outline-secondary shadow-sm me-2">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
        <button onclick="window.print()" class="btn btn-primary shadow">
            <i class="fas fa-print"></i> Imprimir Carnet
        </button>
    </div>

    <div class="carnet-card">
        <?php 
            // Generamos la URL dinámica. 
            // Si quieres la ruta larga usa: base_url('mascotas/ver/'.$m['id_mascota'])
            $url_escaneo = base_url('p/'.$m['id_mascota']); 
            $api_qr = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=" . urlencode($url_escaneo);
        ?>

        <div class="qr-section">
            <img src="<?= $api_qr ?>" class="img-fluid rounded" style="max-width: 130px;">
            
            <button type="button" class="btn btn-sm btn-link text-violeta mt-2 no-print fw-bold text-decoration-none" data-bs-toggle="modal" data-bs-target="#qrModal">
                <i class="fas fa-search-plus"></i> Ver QR
            </button>
        </div>

        <div class="info-section">
            <div class="logo-text"><i class="fas fa-paw"></i> PETZONE QR</div>
            <p class="pet-name"><?= esc($m['nombre']) ?></p>
            <p class="text-muted mb-2"><?= esc($m['especie'] ?? 'Mascota') ?> • <?= esc($m['raza'] ?? 'N/A') ?></p>
            
            <div class="mt-3 p-2 bg-light rounded" style="font-size: 0.75rem; color: #555; border-left: 3px solid #6f42c1;">
                <strong>S.O.S:</strong> Escanea el código para ver mi ficha médica y contactar a mi familia.
            </div>
            <div class="mt-2 small text-muted">ID Dispositivo: #<?= $m['id_mascota'] ?></div>
        </div>
    </div>

    <div class="modal fade no-print" id="qrModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-4" style="border-radius: 20px;">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold">Escanea para ayudar a <?= esc($m['nombre']) ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="<?= $api_qr ?>" class="img-fluid" style="width: 80%; max-width: 300px;">
                    <p class="mt-3 text-muted">Esta imagen se puede escanear directamente desde la pantalla.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>