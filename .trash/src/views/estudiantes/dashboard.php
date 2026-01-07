<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once __DIR__ . "/../inc/head.php"; ?>
    <title>Dashboard | Estudiantes</title>
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
        <h3 class="fw-bold text-dark">Bienvenido, <?= htmlspecialchars($_SESSION['usuario_nombres']) ?> 👋</h3>
        <p class="text-muted">Aquí puedes ver un resumen de tu progreso académico, pagos y configuración de cuenta. Explora las opciones disponibles y mantente al día con tu formación.</p>

        <div class="row g-4">
            <!-- Tarjeta de Matrícula -->
            <div class="col-12 col-md-4">
                <div class="card border-primary">
                    <div class="card-body">
                        <h5 class="card-title text-primary">📚 Matrícula</h5>
                        <?php if ($matricula): ?>
                            <p><strong>Curso:</strong> <?= htmlspecialchars($matricula['curso']) ?></p>
                            <p><strong>Inicio:</strong> <?= date("d/m/Y", strtotime($matricula['fecha_inicio'])) ?></p>
                            <p><strong>Fin:</strong> <?= date("d/m/Y", strtotime($matricula['fecha_fin'])) ?></p>
                            <p><strong>Estado:</strong>
                                <span class="badge 
                                <?= $matricula['estado'] === 'confirmado' ? 'bg-success' : ($matricula['estado'] === 'pendiente' ? 'bg-warning' : 'bg-danger') ?>">
                                    <?= ucfirst($matricula['estado']) ?>
                                </span>
                            </p>
                        <?php else: ?>
                            <p class="text-muted">No estás matriculado aún.</p>
                        <?php endif; ?>
                        <a href="<?= BASE_URL ?>/estudiante/dashboard/matricula" class="btn btn-outline-primary btn-sm">Ver más</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de Pagos -->
            <div class="col-12 col-md-4">
                <div class="card border-success">
                    <div class="card-body">
                        <h5 class="card-title text-success">💳 Pagos</h5>
                        <?php if (!empty($pagos)): ?>
                            <p><strong>Último pago:</strong> S/ <?= number_format($pagos[0]['monto'], 2) ?> (<?= ucfirst($pagos[0]['estado']) ?>)</p>
                        <?php else: ?>
                            <p class="text-muted">No tienes pagos registrados.</p>
                        <?php endif; ?>
                        <a href="<?= BASE_URL ?>/estudiante/dashboard/pagos" class="btn btn-outline-success btn-sm">Ver historial</a>
                    </div>
                </div>
            </div>
        
            <!-- Tarjeta de Configuración -->
            <div class="col-12 col-md-4">
                <div class="card border-warning">
                    <div class="card-body">
                        <h5 class="card-title text-warning">⚙️ Configuración</h5>
                        <p>Administra la seguridad y preferencias de tu cuenta.</p>
                        <a href="<?= BASE_URL ?>/estudiante/dashboard/configuracion" class="btn btn-outline-warning btn-sm">Ir a configuración</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
