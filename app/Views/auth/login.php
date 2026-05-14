    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login | PetZone</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            :root { 
                --violeta: #6f42c1; 
                --violeta-obscuro: #4b2c85; 
            }
            
            body, html { height: 100%; margin: 0; font-family: 'Poppins', sans-serif; overflow: hidden; }
            
            .login-container { display: flex; height: 100vh; }
            
            /* SECCIÓN IZQUIERDA: BRANDING ESTRUCTURADO */
            .brand-side {
                background-color: var(--violeta);
                flex: 1.2;
                display: flex;
                flex-direction: column;
                color: white;
            }

            /* 1. Franja Superior */
            .brand-header {
                padding: 50px 20px;
                text-align: center;
            }
            .brand-header h1 {
                font-weight: 700;
                font-size: 2.5rem;
                letter-spacing: -1px;
            }

            /* 2. Contenedor de Imagen (Centro) */
            .brand-image-container {
                flex-grow: 1; /* Ocupa el espacio restante */
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                background: rgba(0,0,0,0.05); /* Sutil contraste para la imagen */
            }
            .brand-image-container img {
                width: 100%;
                height: 100%;
                object-fit: cover; /* Asegura que la imagen MAPA3D cubra el área */
            }

            /* 3. Franja Inferior */
            .brand-footer {
                padding: 50px 20px;
                text-align: center;
            }
            .brand-footer p {
                font-weight: 300;
                font-size: 1.1rem;
                opacity: 0.9;
            }

            /* SECCIÓN DERECHA: FORMULARIO */
            .form-side {
                flex: 1;
                background: white;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 40px;
            }
            .login-box { width: 100%; max-width: 400px; }
            
            .form-control {
                border-radius: 10px;
                padding: 12px;
                border: 1px solid #eee;
                background: #fdfdfd;
            }
            .form-control:focus {
                box-shadow: 0 0 0 3px rgba(111, 66, 193, 0.1);
                border-color: var(--violeta);
            }

            .btn-login {
                background: var(--violeta);
                color: white;
                border: none;
                padding: 14px;
                border-radius: 10px;
                font-weight: 600;
                width: 100%;
                transition: 0.3s;
            }
            .btn-login:hover { background: var(--violeta-obscuro); transform: translateY(-2px); }

            /* Responsive */
            @media (max-width: 992px) {
                .brand-side { display: none; }
            }
        </style>
    </head>
    <body>

    <div class="login-container">
        <div class="brand-side">
            <div class="brand-header">
                <h1 class="mb-0"><i class="fas fa-paw me-2"></i>PetZone</h1>
            </div>

            <div class="brand-image-container">
                <img src="<?= base_url('uploads/mascotas/personapaseandodog.jpg') ?>" alt="PetZone Tracking System">
            </div>

            <div class="brand-footer">
                <p class="mb-0">La tranquilidad de saber dónde están, siempre.</p>
            </div>
        </div>

        <div class="form-side">
            <div class="login-box">
                <div class="text-center mb-5 d-lg-none">
                    <i class="fas fa-paw text-violeta fs-1" style="color: var(--violeta);"></i>
                    <h2 class="fw-bold" style="color: var(--violeta);">PetZone</h2>
                </div>
                
                <h3 class="fw-bold mb-1 text-dark">Bienvenido de nuevo</h3>
                <p class="text-muted mb-4">Ingresa a tu cuenta para rastrear a tu mascota.</p>

                <form action="<?= base_url('auth/login') ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Correo Electrónico</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="fas fa-envelope text-muted"></i></span>
                            <input type="email" name="email" class="form-control border-0 bg-light" placeholder="nombre@ejemplo.com" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-secondary">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="fas fa-lock text-muted"></i></span>
                            <input type="password" name="password" class="form-control border-0 bg-light" placeholder="••••••••" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-login mb-4 shadow-sm">Entrar al Sistema</button>
                    
                    <div class="text-center">
                        <span class="small text-muted">¿No tienes cuenta aún? 
                            <a href="<?= base_url('auth/registro') ?>" class="text-decoration-none fw-bold" style="color: var(--violeta);">Crear cuenta</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>