<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once __DIR__ . "/../inc/head.php"; ?>
    <title>Mi Perfil | Estudiantes</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/estudiantes/dashboard.css">
    <style>
        /* Ajustes específicos para mejorar el diseño */
        .profile-container {
            max-width: 800px;
            margin: auto;
        }

        .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #17a2b8;
        }

        .profile-card {
            padding: 20px;
            border-radius: 12px;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }

        .info-item i {
            font-size: 1.2rem;
            margin-right: 10px;
            color: #17a2b8;
        }

        @media (max-width: 768px) {
            .container{
                margin-top: 35px;
            }
            .profile-container {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <?php include_once __DIR__ . '/inc/sidebar.php'; ?>

    <div class="container">
        <h3 class="fw-bold text-dark text-center">👤 Mi Perfil</h3>

        <div class="mt-4 card border-info shadow-sm profile-container">
            <div class="card-body profile-card">
                <div class="text-center">
                    <img src="<?= !empty($usuario['foto']) ? htmlspecialchars($usuario['foto']) : 'https://res-console.cloudinary.com/doy35yjhq/thumbnails/v1/image/upload/v1742625599/cHJvZmlsZS1tYWpvci1pY29uLTEwMjR4MTAyNC05cnRneXgzMF9vcDVwNTk=/drilldown' ?>" 
                         alt="Foto de perfil" class="profile-image">
                </div>

                <h5 class="text-center mt-3">
                    <i class="bi bi-person-circle"></i> <?= htmlspecialchars($usuario['nombres'] . ' ' . $usuario['apellidos']) ?>
                </h5>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="info-item"><i class="bi bi-envelope"></i> <strong>Correo:&nbsp;</strong> <?= htmlspecialchars($usuario['email']) ?></div>
                        <div class="info-item"><i class="bi bi-credit-card"></i> <strong>DNI:&nbsp;</strong> <?= htmlspecialchars($usuario['dni']) ?></div>
                        <div class="info-item"><i class="bi bi-phone"></i> <strong>Teléfono:&nbsp;</strong> <?= !empty($usuario['telefono']) ? htmlspecialchars($usuario['telefono']) : '<span class="badge badge-secondary">No registrado</span>' ?></div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item"><i class="bi bi-geo-alt"></i> <strong>Dirección:&nbsp;</strong> <?= !empty($usuario['direccion']) ? htmlspecialchars($usuario['direccion']) : '<span class="badge badge-secondary">No registrada</span>' ?></div>
                        <div class="info-item"><i class="bi bi-calendar-event"></i> <strong>Fecha de Nacimiento:&nbsp;</strong> <?= !empty($usuario['fecha_nacimiento']) ? date("d/m/Y", strtotime($usuario['fecha_nacimiento'])) : '<span class="badge badge-secondary">No registrada</span>' ?></div>
                        <div class="info-item"><i class="bi bi-clock-history"></i> <strong>Fecha de Registro:&nbsp;</strong> <?= date("d/m/Y", strtotime($usuario['fecha_creacion'] ?? '')) ?></div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="<?= BASE_URL ?>/estudiante/dashboard/configuracion" class="btn btn-outline-primary">
                        <i class="bi bi-gear"></i> Configuración
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
