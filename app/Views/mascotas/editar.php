<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetZone | Editar Mascota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root { --violeta: #6f42c1; }
        body { background-color: #f8f9fa; }
        
        /* Navbar con el estilo que pediste */
        .navbar-custom { background-color: var(--violeta); padding: 15px 0; }
        .navbar-brand, .nav-link { color: white !important; font-weight: 500; }
        .nav-link:hover { opacity: 0.8; }
        
        /* Card de edición */
        .card-edit { 
            border-radius: 20px; 
            border: none; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); 
            margin-top: 40px;
            background: white;
        }
        .btn-violeta { 
            background-color: var(--violeta); 
            color: white; 
            border-radius: 50px; 
            padding: 12px; 
            border: none;
            width: 100%;
            font-weight: bold;
        }
        .btn-violeta:hover { background-color: #5a32a3; color: white; }
        .form-label { font-weight: 600; color: #444; }
        .form-control { border-radius: 10px; padding: 10px; border: 1px solid #ddd; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= base_url('mascotas') ?>">
            <i class="fas fa-paw"></i> PetZone
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item px-2">
                    <a class="nav-link" href="<?= base_url('mascotas') ?>"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="<?= base_url('mascotas/crear') ?>"><i class="fas fa-plus-circle"></i> Nuevo Dispositivo</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="#"><i class="fas fa-user-circle"></i> Mi Perfil</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link text-warning fw-bold" href="<?= base_url('auth/logout') ?>"><i class="fas fa-sign-out-alt"></i> Salir</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card card-edit p-4 p-md-5">
                <h3 class="fw-bold mb-1">Configuración</h3>
                <p class="text-muted mb-4">Editando a: <span class="text-violeta fw-bold"><?= $mascota['nombre'] ?></span></p>
                
                <form action="<?= base_url('mascotas/actualizar') ?>" method="POST">
                    <input type="hidden" name="id_mascota" value="<?= $mascota['id_mascota'] ?>">
                    
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Nombre de la Mascota</label>
                            <input type="text" name="nombre" class="form-control" value="<?= $mascota['nombre'] ?>" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Raza</label>
                            <input type="text" name="raza" class="form-control" value="<?= $mascota['raza'] ?>">
                        </div>

                        <div class="col-12">
                            <label class="form-label">WhatsApp de Contacto</label>
                            <input type="text" name="telefono" class="form-control" value="<?= $info_qr['telefono'] ?? '' ?>" placeholder="Ej: 5493571000000">
                            <div class="form-text">Incluí código de país (ej: 549 para Argentina).</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Notas de Emergencia</label>
                            <textarea name="notas" class="form-control" rows="4" placeholder="Indica alergias o cuidados especiales..."><?= $info_qr['notas'] ?? '' ?></textarea>
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-violeta">
                                <i class="fas fa-save me-2"></i> GUARDAR CAMBIOS
                            </button>
                            <div class="text-center mt-3">
                                <a href="<?= base_url('mascotas') ?>" class="text-muted text-decoration-none small">Volver al inicio</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>