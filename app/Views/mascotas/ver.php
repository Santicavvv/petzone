<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetZone | Auxilio para <?= $mascota['nombre'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    
    <style>
        :root { --violeta: #6f42c1; --rojo-emergencia: #dc3545; }
        body { background-color: #f0f2f5; font-family: 'Segoe UI', sans-serif; }
        
        .profile-card { 
            max-width: 500px; 
            margin: 20px auto; 
            border: none; 
            border-radius: 30px; 
            overflow: hidden; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            background: white;
        }
        
        .emergency-header {
            background-color: var(--rojo-emergencia);
            color: white;
            padding: 15px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .pet-photo {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-top: -75px;
        }

        #map-ver { 
            height: 250px; 
            width: 100%; 
            border-radius: 15px; 
            margin: 15px 0;
        }

        .btn-whatsapp { 
            background-color: #25d366; 
            color: white; 
            border-radius: 50px; 
            padding: 15px; 
            font-weight: bold; 
            font-size: 1.1rem;
            transition: 0.3s;
            border: none;
        }
        .btn-whatsapp:hover { background-color: #1ebe57; color: white; transform: scale(1.02); }
        
        .info-box {
            background-color: #f8f9fa;
            border-radius: 15px;
            padding: 15px;
            text-align: left;
        }
    </style>
</head>
<body>

<div class="container px-3">
    <div class="profile-card text-center">
        <div class="emergency-header">
            <i class="fas fa-exclamation-triangle"></i> ¡Mascota Perdida!
        </div>

        <div style="height: 80px; background-color: var(--violeta);"></div>
        <img src="<?= base_url('uploads/mascotas/'.($mascota['foto'] ?? 'default.png')) ?>" class="rounded-circle pet-photo" alt="Mascota">

        <div class="p-4">
            <h2 class="fw-bold mb-1"><?= $mascota['nombre'] ?></h2>
            <p class="text-muted mb-3"><?= $mascota['raza'] ?? 'Raza no especificada' ?></p>

            <div class="info-box mb-4">
                <h6 class="fw-bold text-violeta"><i class="fas fa-info-circle"></i> Mensaje del dueño:</h6>
                <p class="mb-0 text-dark italic">"<?= $info_qr['notas'] ?? 'Por favor, ayúdame a volver a casa. Comunícate con mi familia de inmediato.' ?> El perro de color <?= $mascota['color'] ?? ' ' ?></p>
            </div>

            <h6 class="fw-bold text-start"><i class="fas fa-map-marker-alt text-danger"></i> Mi ubicación actual:</h6>
            <div id="map-ver"></div>

            <div class="d-grid gap-3 mt-4">
                <?php 
                    $tel = $info_qr['telefono'] ?? '';
                    $mensaje = urlencode("¡Hola! Encontré a " . $mascota['nombre'] . ". Escaneé el QR de PetZone y estoy cerca de su ubicación.");
                ?>
                <a href="https://wa.me/<?= $tel ?>?text=<?= $mensaje ?>" class="btn btn-whatsapp shadow">
                    <i class="fab fa-whatsapp"></i> CONTACTAR AL DUEÑO
                </a>

                <a href="<?= base_url('mascotas') ?>" class="btn btn-link text-muted text-decoration-none small">
                    Soy el dueño (Volver al panel)
                </a>
            </div>
        </div>
        
        <div class="py-3 bg-light mt-2">
            <small class="text-muted">Protegido por <b>PetZone QR</b></small>
        </div>
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    // coords fake de prueba OG
    var lat = <?= $mascota['latitud'] ?? -32.1745 ?>; 
    var lon = <?= $mascota['longitud'] ?? -64.1132 ?>;

    var map = L.map('map-ver', {
        zoomControl: false,
        dragging: !L.Browser.mobile,
        touchZoom: true
    }).setView([lat, lon], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);

    var marker = L.marker([lat, lon]).addTo(map)
        .bindPopup("<b><?= $mascota['nombre'] ?></b> está aquí.")
        .openPopup();
</script>

</body>
</html>