<?php
$usuarios = $usuarios ?? [];
$roles = ['administrador', 'docente', 'estudiante'];
$rolSeleccionado = $rolSeleccionado ?? 'administrador';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once __DIR__ . "/../inc/head.php" ?>
    <title>Usuarios Activos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/admin/listado.css">
</head>

<body>
    <div class="container-fluid">
        <?php include __DIR__ . '/inc/sidebar.php'; ?>

        <div class="main-content">
            <div class="card">
                <div class="card-body">
                    <h2 class="mb-3 text-primary"><i class="bi bi-people"></i> Usuarios Activos</h2>
                    <p class="text-muted">Lista de usuarios activos organizados por rol.</p>

                    <!-- Tabs -->
                    <ul class="nav nav-tabs">
                        <?php foreach ($roles as $rol): ?>
                            <li class="nav-item">
                                <a class="nav-link <?= $rolSeleccionado === $rol ? 'active' : '' ?>"
                                    href="?route=usuario/listar&rol=<?= urlencode($rol) ?>">
                                    <?= ucfirst($rol) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <!-- Tabla con scroll -->
                    <div class="tab-content mt-3">
                        <div class="tab-pane fade show active">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover align-middle">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Correo</th>
                                            <th>Teléfono</th>
                                            <th>Dirección</th>
                                            <th>Fecha de Nac.</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($usuarios)): ?>
                                            <tr>
                                                <td colspan="8" class="text-center text-muted">No hay usuarios en este rol.</td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach ($usuarios as $usuario): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($usuario['usuario_id']); ?></td>
                                                    <td><?= htmlspecialchars($usuario['nombres']); ?></td>
                                                    <td><?= htmlspecialchars($usuario['apellidos']); ?></td>
                                                    <td><?= htmlspecialchars($usuario['email']); ?></td>
                                                    <td><?= htmlspecialchars($usuario['telefono']); ?></td>
                                                    <td><?= htmlspecialchars($usuario['direccion']); ?></td>
                                                    <td><?= htmlspecialchars($usuario['fecha_nacimiento']); ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Editar</a>
                                                        <a href="?route=usuario/deleteUser&id=<?= $usuario['usuario_id']; ?>"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('¿Eliminar usuario?');">
                                                            <i class="bi bi-trash"></i> Eliminar
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Paginación -->
                            <nav aria-label="Paginación">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item <?= $paginaActual == 1 ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?route=usuario/listar&rol=<?= urlencode($rolSeleccionado) ?>&pagina=<?= $paginaActual - 1; ?>">
                                            <i class="bi bi-arrow-left"></i> Anterior
                                        </a>
                                    </li>
                                    <li class="page-item <?= $paginaActual == $totalPaginas ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?route=usuario/listar&rol=<?= urlencode($rolSeleccionado) ?>&pagina=<?= $paginaActual + 1; ?>">
                                            Siguiente <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>