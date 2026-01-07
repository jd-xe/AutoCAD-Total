<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once __DIR__ . "/../inc/head.php"; ?>
    <title>Matrícula | Estudiantes</title>
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
        <h3 class="fw-bold text-dark">Mis Cursos Matriculados 📚</h3>
        <p class="text-muted">Aquí puedes ver los cursos en los que estás matriculado.</p>

        <?php if ($matricula): ?>
            <div class="card border-primary">
                <div class="card-body">
                    <h5 class="card-title">📖 Curso: <?= htmlspecialchars($matricula['curso']) ?></h5>
                    <p><strong>Grupo:</strong> <?= htmlspecialchars($matricula['grupo_id']) ?></p>
                    <p><strong>Fecha de Inicio:</strong> <?= date("d/m/Y", strtotime($matricula['fecha_inicio'])) ?></p>
                    <p><strong>Fecha de Fin:</strong> <?= date("d/m/Y", strtotime($matricula['fecha_fin'])) ?></p>
                    <p><strong>Estado:</strong>
                        <span class="badge 
                            <?= $matricula['estado'] === 'confirmado' ? 'bg-success' : ($matricula['estado'] === 'pendiente' ? 'bg-warning' : 'bg-danger') ?>">
                            <?= ucfirst($matricula['estado']) ?>
                        </span>
                    </p>

                    <!-- Sección de Horarios -->
                    <h5 class="mt-3">📅 Horarios</h5>
                    <?php if (!empty($horarios)): ?>
                        <ul class="list-group">
                            <?php foreach ($horarios as $horario): ?>
                                <li class="list-group-item">
                                    <strong><?= htmlspecialchars($horario['dia']) ?>:</strong>
                                    <?= date("h:i A", strtotime($horario['hora_inicio'])) ?> - <?= date("h:i A", strtotime($horario['hora_fin'])) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-muted">No hay horarios registrados para este grupo.</p>
                    <?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                No tienes matrículas registradas.
            </div>
        <?php endif; ?>
    </div>
</body>

</html>