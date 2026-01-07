<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once __DIR__ . "/../inc/head.php"; ?>
    <title>Configuración | Estudiantes</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/estudiantes/dashboard.css">
    <style>
    @media (max-width: 768px) {
        .container {
            margin-top: 35px;
        }
    }
    </style>
</head>

<body>
    <?php include_once __DIR__ . '/inc/sidebar.php'; ?>

    <div class="container">
        <h3 class="fw-bold text-dark">⚙️ Configuración</h3>
        <p class="text-muted">Aquí puedes cambiar tu contraseña.</p>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success"><i class="bi bi-check-circle"></i> <?= htmlspecialchars($_GET['success']) ?></div>
        <?php endif; ?>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><i class="bi bi-exclamation-triangle"></i> <?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form action="<?= BASE_URL ?>/estudiante/estudiante/cambiarClave" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="password_actual" class="form-label">🔑 Contraseña actual</label>
                <input type="password" class="form-control" id="password_actual" name="password_actual" required>
            </div>
            <div class="mb-3">
                <label for="nueva_password" class="form-label">🆕 Nueva contraseña</label>
                <input type="password" class="form-control" id="nueva_password" name="nueva_password" required>
            </div>
            <div class="mb-3">
                <label for="confirmar_password" class="form-label">✅ Confirmar nueva contraseña</label>
                <input type="password" class="form-control" id="confirmar_password" name="confirmar_password" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Actualizar Contraseña
            </button>
        </form>
    </div>
</body>

</html>