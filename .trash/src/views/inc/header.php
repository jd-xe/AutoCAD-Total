<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <!-- Logo o Icono de la Empresa -->
            <div style="display: flex; align-items: center;">
                <a class="navbar-brand" href="<?= BASE_URL ?>">
                    <img id="rotating-logo" src="<?php echo BASE_URL; ?>/img/amisam.png" alt="AMISAM" class="d-inline-block align-text-top">
                </a>
                <img class="scaled-image" src="<?php echo BASE_URL; ?>/img/amisam-name.png" alt="AMISAM">
            </div>

            <!-- Botón de menú móvil -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenido del Navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?php echo "/home"; ?>"><i class="bi bi-house-door-fill"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?php echo "/contact"; ?>"><i class="bi bi-envelope-fill me-2"></i>Contacto</a>
                    </li>
                    <?php if (!isset($_SESSION['rol'])): ?>
                        <!-- Mostrar botón de iniciar sesión si no hay sesión activa -->
                        <li class="nav-item">
                            <a class="btn text-light style-none" href="" data-bs-toggle="modal" data-bs-target="#loginModal">
                                <i class="bi bi-person-fill me-2"></i> Iniciar Sesión
                            </a>
                        </li>
                    <?php else: ?>
                        <!-- Mostrar botón de cerrar sesión si hay sesión activa -->
                        <li class="nav-item">
                            <a class="btn text-light text-light" href="https://autocadtotal.com/auth/logout">
                                <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- modal para iniciar sesion -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img id="rotating-logo" src="<?= BASE_URL; ?>/img/amisam.png" alt="Logo Empresa" class="d-inline-block align-text-top">
                <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" placeholder="nombre@ejemplo.com">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="Contraseña">
                    </div>
                    <div id="loginError" class="text-danger" style="display:none;">Correo o contraseña incorrectos.</div>
                    <button type="submit" class="btn btn-primary w-100" id="loginButton">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://autocadtotal.com//js/login.js"></script>
<script src="<?= BASE_URL; ?>/js/login.js"></script>