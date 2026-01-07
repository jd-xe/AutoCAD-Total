<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once __DIR__ . "/../inc/head.php"; ?>
    <title>Historial de Pagos | Estudiantes</title>
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
        <h3 class="fw-bold text-dark">💳 Historial de Pagos</h3>
        <p class="text-muted">Aquí puedes ver el estado de tus pagos.</p>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Concepto</th>
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pagos)): ?>
                        <?php foreach ($pagos as $pago): ?>
                            <tr class="text-center">
                                <td>📚 <?= htmlspecialchars($pago['concepto_id']) ?> - <?= htmlspecialchars($pago['concepto']) ?></td>
                                <td><strong>S/. <?= number_format($pago['monto'], 2) ?></strong></td>
                                <td>
                                    <span class="badge 
                                        <?= $pago['estado'] == 'aprobado' ? 'bg-success' : ($pago['estado'] == 'pendiente' ? 'bg-warning text-dark' : 'bg-danger') ?>">
                                        <?= ucfirst($pago['estado']) ?>
                                    </span>
                                </td>
                                <td>📆 <?= date('d/m/Y', strtotime($pago['fecha_pago'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">No tienes pagos registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>