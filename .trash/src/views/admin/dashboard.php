<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once __DIR__ . "/../inc/head.php"; ?>
    <title>Dashboard | Admin</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/admin/dashboard.css">
</head>

<body>
    <?php include_once __DIR__ . '/inc/sidebar.php'; ?>

    <div id="content" class="content">
        <h3 class="mt-4 text-primary"><i class="bi bi-speedometer2"></i> Dashboard</h3>
        <p class="text-muted">Resumen general del sistema.</p>

        <div class="row">
            <!-- Tarjeta de Usuarios -->
            <div class="col-md-4 col-12 mb-3">
                <div class="card border-primary text-center p-3">
                    <h5 class="card-title text-primary"><i class="bi bi-people"></i> Usuarios</h5>
                    <p class="fs-5"><strong><?= htmlspecialchars($totalUsuarios) ?></strong></p>
                    <a href="<?= BASE_URL ?>/admin/dashboard/usuarios" class="btn btn-primary btn-sm">Ver más</a>
                </div>
            </div>

            <!-- Tarjeta de Pagos -->
            <div class="col-md-4 col-12 mb-3">
                <div class="card border-success text-center p-3">
                    <h5 class="card-title text-success"><i class="bi bi-cash-stack"></i> Pagos</h5>
                    <p class="fs-5"><strong>S/. 200.00</strong></p>
                    <a href="<?= BASE_URL ?>/admin/dashboard/pagos" class="btn btn-success btn-sm">Ver pagos</a>
                </div>
            </div>

            <!-- Tarjeta de Reportes -->
            <div class="col-md-4 col-12 mb-3">
                <div class="card border-warning text-center p-3">
                    <h5 class="card-title text-warning"><i class="bi bi-bar-chart"></i> Reportes</h5>
                    <p class="fs-5">Genera reportes</p>
                    <a href="<?= BASE_URL ?>/admin/dashboard/reporte" class="btn btn-warning btn-sm">Ver reportes</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
