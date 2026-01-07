<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pagos</title>
    <link rel="stylesheet" href="<?= BASE_PATH ?>/public/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Mis Pagos</h2>

        <?php if (!empty($pagos)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Monto</th>
                        <th>Método de Pago</th>
                        <th>Fecha de Pago</th>
                        <th>Estado</th>
                        <th>Comprobante</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pagos as $index => $pago): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td>S/ <?= number_format($pago['monto'], 2) ?></td>
                            <td><?= htmlspecialchars($pago['metodo_pago']) ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($pago['fecha_pago'])) ?></td>
                            <td>
                                <?php if ($pago['estado'] === 'pendiente'): ?>
                                    <span class="badge bg-warning">Pendiente</span>
                                <?php elseif ($pago['estado'] === 'aprobado'): ?>
                                    <span class="badge bg-success">Aprobado</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Rechazado</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($pago['comprobante_pago']): ?>
                                    <a href="<?= htmlspecialchars($pago['comprobante_pago']) ?>" target="_blank">
                                        <img src="<?= htmlspecialchars($pago['comprobante_pago']) ?>" alt="Comprobante" width="50">
                                    </a>
                                <?php else: ?>
                                    <span class="text-danger">No disponible</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center">No tienes pagos registrados.</p>
        <?php endif; ?>
    </div>
</body>

</html>