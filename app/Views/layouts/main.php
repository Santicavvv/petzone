<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetZone | <?= $this->renderSection('titulo') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --violeta-principal: #6f42c1;
            --violeta-claro: #f3effb;
            --bg-gris: #f8f9fa;
        }
        body { font-family: 'Poppins', sans-serif; background-color: var(--bg-gris); }
        .navbar-brand { font-weight: 700; color: var(--violeta-principal) !important; transition: 0.3s; }
        .navbar-brand:hover { transform: scale(1.05); }
        .btn-violeta { background: var(--violeta-principal); color: white; border-radius: 50px; }
        .btn-violeta:hover { background: #5a32a3; color: white; }
        .card-custom { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        /* Ajuste para el botón "Ir al Panel" */
.btn-outline-violeta {
    border: 2px solid var(--violeta-principal);
    color: var(--violeta-principal);
    background-color: transparent;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease; /* Hace que el cambio de color sea suave */
}

.btn-outline-violeta:hover {
    background-color: var(--violeta-principal);
    color: white !important;
    transform: translateY(-2px); /* Un pequeño salto hacia arriba */
    box-shadow: 0 4px 10px rgba(111, 66, 193, 0.2);
}

/* Efecto para el nombre del usuario y logout */
.nav-item.border-start {
    border-color: #dee2e6 !important;
}

.text-danger:hover {
    color: #a71d2a !important; /* Un rojo más oscuro al pasar el mouse por el logout */
}
    </style>
    <?= $this->renderSection('estilos') ?>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container">
       <a class="navbar-brand" href="<?= base_url('/') ?>">
    <i class="fas fa-paw"></i> PetZone
</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                
                <?php if(session()->get('isLoggedIn')): ?>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="<?= base_url('mascotas') ?>">
                            <i class="fas fa-dog me-1"></i> Mascotas
                        </a>
                    </li>
                    
                    <li class="nav-item me-3">
                        <a class="btn btn-outline-violeta px-3" href="<?= base_url('dashboard') ?>" 
                           style="border-color: var(--violeta-principal); color: var(--violeta-principal); border-radius: 50px; font-weight: 600;">
                            <i class="fas fa-columns me-1"></i> Ir al Panel
                        </a>
                    </li>

                    <li class="nav-item border-start ps-3">
                        <span class="text-muted small">Hola, <strong><?= session()->get('nombre') ?></strong></span>
                        <a class="ms-2 text-danger text-decoration-none" href="<?= base_url('auth/logout') ?>" title="Cerrar Sesión">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>

                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('auth/login') ?>">Ingresar</a></li>
                    <li class="nav-item">
                        <a class="btn btn-violeta ms-lg-2 px-4 shadow-sm" href="<?= base_url('auth/registro') ?>">
                            Registro
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>
    <main class="container">
        <?= $this->renderSection('contenido') ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>