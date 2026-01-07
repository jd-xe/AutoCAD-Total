<?php
$usuariosActivos = $usuariosActivos ?? [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Activos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include __DIR__ . '/../inc/header.php'; ?>

    <div class="container mt-5">
        <h1 class="mb-4">Usuarios Activos</h1>
        <p class="text-muted">Lista de todos los usuarios activos en el sistema.</p>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['message']; ?>
                <?php unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <a href="usuario/downloadExcel" class="btn btn-success">
                Descargar Excel <i class="bi bi-download"></i>
            </a>
        </div>

        <?php if (empty($usuariosActivos)): ?>
            <div class="alert alert-warning">
                No hay usuarios activos en el sistema.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Fecha de Nac.</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuariosActivos as $usuario): ?>
                            <tr>
                                <td><?= htmlspecialchars($usuario['usuario_id']); ?></td>
                                <td><?= htmlspecialchars($usuario['nombres']); ?></td>
                                <td><?= htmlspecialchars($usuario['apellidos']); ?></td>
                                <td><?= htmlspecialchars($usuario['email']); ?></td>
                                <td><?= htmlspecialchars($usuario['telefono']); ?></td>
                                <td><?= htmlspecialchars($usuario['direccion']); ?></td>
                                <td><?= htmlspecialchars($usuario['fecha_nacimiento']); ?></td>
                                <td>
                                    <a data-id="<?= $usuario['usuario_id']; ?>" data-bs-toggle="modal" data-bs-target="#editarUsuarioModal" class="btn btn-primary btn-sm editar-usuario">Editar</a>
                                    <a href="usuario/deleteUser?id=<?= $usuario['usuario_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <nav aria-label="Paginación de usuarios">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?= $paginaActual == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="usuario/listar?pagina=<?= $paginaActual - 1; ?>" tabindex="-1">Anterior</a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                        <li class="page-item <?= $paginaActual == $i ? 'active' : '' ?>">
                            <a class="page-link" href="usuario/listar?pagina=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?= $paginaActual == $totalPaginas ? 'disabled' : '' ?>">
                        <a class="page-link" href="usuario/listar?pagina=<?= $paginaActual + 1; ?>">Siguiente</a>
                    </li>
                </ul>
            </nav>
        <?php endif; ?>
    </div>

    <div class="modal fade" id="editarUsuarioModal" tabindex="-1" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formEditarUsuario" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarUsuarioModalLabel">Editar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="usuario_id" id="usuario_id">
                        <div class="mb-3">
                            <label for="nombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="email_editar" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include __DIR__ . '/../inc/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script stc="https://autocadtotal.com//js/modal.js"></script>
</body>

</html>