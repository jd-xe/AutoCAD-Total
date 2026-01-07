<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once BASE_PATH . "/src/views/inc/head.php"; ?>
    <title>Pagos | Admin</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/admin/pagos.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container-fluid {
            margin-left: 260px;
            padding-top: 20px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .badge {
            font-size: 0.9rem;
        }

        .table-responsive {
            max-height: 70vh;
            overflow-y: auto;
        }

        .table thead {
            background-color: #343a40;
            color: white;
        }

        .btn-sm {
            padding: 6px 10px;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/inc/sidebar.php'; ?>

    <div class="container-fluid">
        <h2 class="mb-3 text-primary"><i class="bi bi-cash-stack"></i> Gestión de Pagos</h2>
        <p class="text-muted">Administra los pagos de los estudiantes y aprueba los comprobantes.</p>

        <!-- Mensajes de éxito o error -->
        <?php if (isset($_GET['success'])) : ?>
            <div class="alert alert-success"><?= htmlspecialchars($_GET['success']) ?></div>
        <?php elseif (isset($_GET['error'])) : ?>
            <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
        <?php endif; ?>

        <div class="card p-3">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Estudiante</th>
                            <th>Monto</th>
                            <th>Estado</th>
                            <th>Comprobante</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pagos as $pago) : ?>
                            <tr>
                                <td><?= htmlspecialchars($pago['pago_id']) ?></td>
                                <td><?= htmlspecialchars($pago['nombres'] . ' ' . $pago['apellidos']) ?></td>
                                <td>S/ <?= number_format($pago['monto'], 2) ?></td>
                                <td>
                                    <span class="badge bg-<?= $pago['estado'] === 'aprobado' ? 'success' : ($pago['estado'] === 'rechazado' ? 'danger' : 'warning') ?>">
                                        <?= ucfirst(htmlspecialchars($pago['estado'])) ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if (!empty($pago['comprobante_url'])) : ?>
                                        <a href="<?= htmlspecialchars($pago['comprobante_url']) ?>" target="_blank" class="btn btn-info btn-sm">
                                            <i class="bi bi-receipt"></i> Ver
                                        </a>
                                    <?php else : ?>
                                        <span class="text-muted">No disponible</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($pago['estado'] === 'verificacion') : ?>
                                        <form action="<?= BASE_URL ?>/admin/pago/aprobar" method="POST" class="d-inline">
                                            <input type="hidden" name="pago_id" value="<?= htmlspecialchars($pago['pago_id']) ?>">
                                            <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-check-lg"></i> Aprobar</button>
                                        </form>

                                        <form action="<?= BASE_URL ?>/admin/pago/rechazar" method="POST" class="d-inline">
                                            <input type="hidden" name="pago_id" value="<?= htmlspecialchars($pago['pago_id']) ?>">
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i> Rechazar</button>
                                        </form>
                                    <?php else : ?>
                                        <span class="text-muted">Finalizado</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

</html>