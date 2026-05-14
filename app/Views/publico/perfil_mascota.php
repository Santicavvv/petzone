<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PetZone - Perfil de <?= $mascota['nombre'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: sans-serif; text-align: center; padding: 20px; background-color: #f4f4f9; }
        .card { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); max-width: 400px; margin: auto; }
        .btn-whatsapp { background-color: #25D366; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 15px; }
        .alerta { color: #d9534f; font-weight: bold; border: 1px solid #d9534f; padding: 10px; border-radius: 5px; margin-top: 10px; }
    </style>
</head>
<body>

<div class="card">
    <h1>🐾 <?= ($info['nombre_visible'] ?? 1) ? $mascota['nombre'] : 'Mascota Protegida' ?></h1>
    
    <p><strong>Especie:</strong> <?= $mascota['especie'] ?> | <strong>Raza:</strong> <?= $mascota['raza'] ?></p>

    <?php if (!empty($info['mensaje_auxilio'])): ?>
        <div class="alerta">
            ⚠️ NOTA IMPORTANTE: <br>
            <?= $info['mensaje_auxilio'] ?>
        </div>
    <?php endif; ?>

    <hr>

    <h3>Contacto del Dueño</h3>
    <?php if ($info['telefono_visible'] ?? 1): ?>
        <p>Teléfono: <?= $dueno['telefono'] ?></p>
        <a href="https://wa.me/<?= str_replace(['+', ' '], '', $dueno['telefono']) ?>?text=Hola,%20encontré%20a%20tu%20mascota%20<?= $mascota['nombre'] ?>%20usando%20PetZone" class="btn-whatsapp">
            Enviar WhatsApp al dueño
        </a>
    <?php endif; ?>

    <?php if ($info['direccion_visible'] ?? 0): ?>
        <p><strong>Dirección de retorno:</strong><br> <?= $dueno['nombre'] ?> (Dueño)</p>
    <?php endif; ?>

    <?php if (!empty($info['telefono_alternativo'])): ?>
        <div style="margin-top: 20px; border-top: 1px solid #eee; padding-top: 10px;">
            <p><strong>Contacto de Emergencia:</strong><br>
            <?= $info['nombre_alternativo'] ?>: <?= $info['telefono_alternativo'] ?></p>
        </div>
    <?php endif; ?>
</div>

<p style="font-size: 0.8em; color: #888; margin-top: 30px;">Energizado por PetZone 2026</p>

</body>
</html>