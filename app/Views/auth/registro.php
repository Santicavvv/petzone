<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetZone - Crear Cuenta</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --pet-violet: #6f42c1;
            --pet-light: #f8f9fa;
        }

        body { 
            background-color: var(--pet-light);
            font-family: 'Lato', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .registro-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border: none;
            width: 100%;
            max-width: 500px;
            padding: 40px;
        }

        .logo-text {
            font-family: 'Poppins', sans-serif;
            color: var(--pet-violet);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .subtitle {
            color: #6c757d;
            font-size: 0.95rem;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 700;
            color: #495057;
            font-size: 0.85rem;
            margin-bottom: 8px;
        }

        .form-control {
            background-color: #f1f3f5;
            border: 2px solid transparent;
            border-radius: 12px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background-color: #fff;
            border-color: var(--pet-violet);
            box-shadow: none;
            color: #212529;
        }

        .btn-pet {
            background-color: var(--pet-violet);
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: 700;
            color: white;
            transition: transform 0.2s, background-color 0.2s;
        }

        .btn-pet:hover {
            background-color: #5a32a3;
            transform: translateY(-2px);
            color: white;
        }

        .auth-footer {
            margin-top: 25px;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .auth-footer a {
            color: var(--pet-violet);
            text-decoration: none;
            font-weight: 700;
        }

        /* Estilo para los errores de CI4 */
        .alert-danger {
            border-radius: 12px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="registro-card">
    <div class="text-center">
        <h1 class="logo-text">PetZone</h1>
        <p class="subtitle">Crea tu cuenta para proteger a tu mascota.</p>
    </div>

    <?php if (session()->getFlashdata('err')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('err') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('auth/registroPost') ?>" method="post">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control"  required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Correo Electrónico</label>
            <input type="email" name="email" class="form-control" placeholder="nombre@gmail.com" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" placeholder="Ej: +54 9..." required>
        </div>

        <div class="mb-4">
            <label class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" placeholder="Mínimo 6 caracteres" required>
        </div>

        <button type="submit" class="btn btn-pet w-100">Crear Cuenta</button>
    </form>

    <div class="text-center auth-footer">
        <p>¿Ya tienes cuenta? <a href="<?= base_url('auth/login') ?>">Inicia Sesión</a></p>
        <a href="<?= base_url('/') ?>" class="text-muted small">Volver al inicio</a>
    </div>
</div>

</body>
</html>