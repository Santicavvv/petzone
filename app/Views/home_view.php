<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetZone | Seguridad para tu mascota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --violeta-principal: #6f42c1;
            --violeta-oscuro: #5a32a3;
            --violeta-claro: #f3effb;
            --texto-oscuro: #2d3436;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--texto-oscuro);
        }

        .navbar {
            background-color: white !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .navbar-brand {
            font-weight: 700;
            color: var(--violeta-principal) !important;
            font-size: 1.5rem;
        }

        .hero {
            padding: 100px 0;
            background: linear-gradient(135deg, var(--violeta-claro) 0%, #ffffff 100%);
        }
        .hero-title {
            font-weight: 700;
            font-size: 3.5rem;
            color: var(--violeta-oscuro);
            line-height: 1.2;
        }
        .btn-violeta {
            background-color: var(--violeta-principal);
            color: white;
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 600;
            transition: 0.3s;
            border: none;
        }
        .btn-violeta:hover {
            background-color: var(--violeta-oscuro);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(111, 66, 193, 0.3);
        }

        /* Carrusel Config */
        .carousel-banner {
            height: 65vh; 
            min-height: 450px; 
            border-radius: 15px; 
            overflow: hidden;
            margin-top: 40px;
            margin-bottom: 20px;
        }
        .carousel-banner img {
            width: 100%;
            height: 100%;
            object-fit: cover; 
            filter: brightness(0.65); 
        }
        .carousel-caption {
            top: 75% !important;
            bottom: auto !important;
            transform: translateY(-50%);
            text-shadow: 2px 2px 12px rgba(0,0,0,0.9);
        }

        .feature-card {
            padding: 40px;
            border-radius: 20px;
            background: white;
            border: 1px solid #eee;
            transition: 0.3s;
            height: 100%;
        }
        .feature-card:hover {
            border-color: var(--violeta-principal);
            transform: translateY(-10px);
        }
        .icon-box {
            width: 70px;
            height: 70px;
            background-color: var(--violeta-claro);
            color: var(--violeta-principal);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        footer {
            background-color: var(--texto-oscuro);
            color: white;
            padding: 50px 0 20px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/') ?>"><i class="fas fa-paw"></i> PetZone</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link px-3" href="#servicios">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="<?= base_url('auth/login') ?>">Ingresar</a></li>
                    <li class="nav-item"><a class="btn btn-violeta ms-lg-3" href="<?= base_url('auth/registro') ?>">Unirse gratis</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-title mb-4">Tu mascota merece estar protegida</h1>
                    <p class="lead mb-5 text-muted">Combinamos tecnología GPS y perfiles QR inteligentes para que nunca pierdas el rastro de tu mejor amigo.</p>
                    <div class="d-flex gap-3">
                        <a href="<?= base_url('auth/registro') ?>" class="btn btn-violeta btn-lg">Comenzar ahora</a>
                        <a href="#servicios" class="btn btn-outline-secondary btn-lg rounded-pill">Saber más</a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Pet Icon" class="img-fluid" style="max-width: 80%; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1));">
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div id="petzoneCarousel" class="carousel slide shadow carousel-banner" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#petzoneCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#petzoneCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#petzoneCarousel" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#petzoneCarousel" data-bs-slide-to="3"></button>
            </div>
            <div class="carousel-inner h-100">
                <div class="carousel-item active h-100">
                    <img src="<?= base_url('uploads/mascotas/personapaseandodog.jpg') ?>" class="d-block w-100 h-100" style="object-position: center 20%;" alt="Paseo">
                    <div class="carousel-caption">
                        <h2 class="display-5 fw-bold text-white">Protección en cada paso</h2>
                        <p class="lead text-light">La seguridad de tu mejor amigo nos mueve.</p>
                    </div>
                </div>
                <div class="carousel-item h-100">
                    <img src="<?= base_url('uploads/mascotas/horizontal gato.jpg') ?>" class="d-block w-100 h-100" alt="Gato">
                    <div class="carousel-caption">
                        <h2 class="display-5 fw-bold text-white">Seguridad Y Comodidad</h2>
                        <p class="lead text-light">Su bienestar es la prioridad</p>
                    </div>
                </div>
                <div class="carousel-item h-100">
                    <img src="<?= base_url('uploads/mascotas/Horizontal 2pets.jpg') ?>" class="d-block w-100 h-100" alt="Mascotas">
                    <div class="carousel-caption">
                        <h2 class="display-5 fw-bold text-white">Tranquilidad Familiar</h2>
                        <p class="lead text-light">Porque son parte fundamental de tu vida.</p>
                    </div>
                </div>
                <div class="carousel-item h-100">
                    <img src="<?= base_url('uploads/mascotas/Aparato.png') ?>" class="d-block w-100 h-100" alt="Dispositivo">
                    <div class="carousel-caption">
                        <h2 class="display-5 fw-bold text-white">Tecnología De Seguimiento</h2>
                        <p class="lead text-light">Hardware GPS integrado en un arnés premium.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#petzoneCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#petzoneCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

   

    <section id="servicios" class="py-5">
        <div class="container my-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Nuestra Tecnología</h2>
                <p class="text-muted">Innovación aplicada al bienestar animal.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="icon-box"><i class="fas fa-qrcode"></i></div>
                        <h4>Perfil QR</h4>
                        <p class="text-muted">Contacto directo vía WhatsApp sin intermediarios.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                        <h4>GPS ESP32</h4>
                        <p class="text-muted">Ubicación exacta procesada por hardware dedicado.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="icon-box"><i class="fas fa-bell"></i></div>
                        <h4>GeoCercas</h4>
                        <p class="text-muted">Alertas si tu mascota sale del perímetro seguro.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container text-center">
            <p class="text-secondary small">© 2026 PetZone. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>