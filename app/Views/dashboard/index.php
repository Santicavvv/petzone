<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetZone | Mi Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --violeta-principal: #6f42c1;
            --violeta-claro: #f3effb;
            --bg-gris: #f8f9fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-gris);
        }

        .navbar-brand { font-weight: 700; color: var(--violeta-principal) !important; }

        .welcome-banner {
            background: linear-gradient(135deg, var(--violeta-principal), #8e44ad);
            color: white;
            padding: 30px;
            border-radius: 20px;
            margin-bottom: 30px;
            box-shadow: 0 10px 20px rgba(111, 66, 193, 0.2);
        }

        .action-btn {
            background: white;
            border: 2px solid var(--violeta-claro);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            color: var(--violeta-principal);
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }
        .action-btn:hover {
            background: var(--violeta-principal);
            color: white;
            border-color: var(--violeta-principal);
        }
        .action-btn i { font-size: 2rem; display: block; margin-bottom: 10px; }

        .logout-link { color: #dc3545; text-decoration: none; font-weight: 600; }

        /* ESTILOS NUEVOS: EL BANNER DE VIDEO PURO */
        .video-banner-container {
            width: 100%;
            height: 350px; /* Puedes cambiar la altura aquí */
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .video-banner-container video {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Hace que el video llene el cuadro sin deformarse */
            display: block;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/') ?>"><i class="fas fa-paw"></i> PetZone</a>
            <div class="ms-auto">
                <span class="me-3 d-none d-md-inline text-muted">Hola, <strong><?= session()->get('nombre') ?? 'santino' ?></strong></span>
                <a href="<?= base_url('auth/logout') ?>" class="logout-link"><i class="fas fa-sign-out-alt"></i> Salir</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-banner d-flex align-items-center justify-content-between">
            <div>
                <h2 class="fw-bold m-0">¡Bienvenido a tu Panel!</h2>
                <p class="m-0 mt-2 opacity-75">Aquí puedes gestionar la seguridad de tus mejores amigos.</p>
            </div>
            <i class="fas fa-user-shield fa-3x opacity-50 d-none d-md-block"></i>
        </div>

        <h5 class="fw-bold mb-4">¿Qué deseas hacer hoy?</h5>
        <div class="row g-4 mb-5">
            <div class="col-6 col-md-3">
                <a href="<?= base_url('mascotas') ?>" class="action-btn d-block">
                    <i class="fas fa-list"></i> Mis Mascotas
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="<?= base_url('mascotas/crear') ?>" class="action-btn d-block">
                    <i class="fas fa-plus-circle"></i> Añadir Mascota
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="#" class="action-btn d-block">
                    <i class="fas fa-satellite-dish"></i> Vincular GPS
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="#" class="action-btn d-block">
                    <i class="fas fa-shield-cat"></i> Zonas Seguras
                </a>
            </div>
        </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>