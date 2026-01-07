<?php $current_route = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);?>

<button id="sidebarToggle" class="btn btn-dark d-md-none" style="position: fixed; top: 15px; left: 15px; z-index: 1000;">
    <i class="fas fa-bars"></i>
</button>

<div id="sidebar" class="sidebar bg-dark text-white">
    <h4 class="text-center py-3">Panel de Estudiantes</h4>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-white <?= ($current_route == BASE_URL . '/dashboard') ? 'active' : '' ?>"
                href="<?= BASE_URL ?>/estudiante/dashboard">
                <i class="fas fa-home"></i> Inicio
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white <?= (strpos($current_route, '/pagos') !== false) ? 'active' : '' ?>"
                href="<?= BASE_URL ?>/estudiante/dashboard/pagos">
                <i class="fas fa-money-check-alt"></i> Pagos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white <?= (strpos($current_route, '/matricula') !== false) ? 'active' : '' ?>"
                href="<?= BASE_URL ?>/estudiante/dashboard/matricula">
                <i class="fas fa-book"></i> Matrícula
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white <?= ($current_route == BASE_URL . '/dashboard') ? 'active' : '' ?>"
                href="<?= BASE_URL ?>/estudiante/dashboard/perfil">
                <i class="fas fa-user-circle"></i> Mi Perfil
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= BASE_URL ?>/estudiante/dashboard/configuracion"
                class="nav-link text-white <?= (strpos($current_route, '/configuracion') !== false) ? 'active' : '' ?>">
                <i class="fas fa-cog"></i> Configuración
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white <?= (strpos($current_route, '/logout') !== false) ? 'active' : '' ?>"
                href="<?= BASE_URL ?>/auth/logout">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </a>
        </li>
    </ul>
</div>

<!-- JavaScript para el Toggle -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sidebar = document.getElementById("sidebar");
        const toggleButton = document.getElementById("sidebarToggle");
        const content = document.querySelector(".container");

        toggleButton.addEventListener("click", function() {
            sidebar.classList.toggle("show");

            if (window.innerWidth < 768) {
                if (sidebar.classList.contains("show")) {
                    content.style.marginLeft = "260px";
                    } else {
                        content.style.marginLeft = "0";
                    }
                }
        });

        // Cerrar el sidebar si se toca fuera de él en móviles
        document.addEventListener("click", function(event) {
            if (window.innerWidth < 768 && !sidebar.contains(event.target) && !toggleButton.contains(event.target)) {
                sidebar.classList.remove("show");
                content.style.marginLeft = "0";
            }
        });
    });
</script>
