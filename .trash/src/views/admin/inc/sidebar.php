<?php $current_route = $_SERVER['REQUEST_URI']; ?>

<button id="sidebarToggle" class="btn btn-dark d-md-none" style="position: fixed; top: 15px; left: 15px; z-index: 1000;">
    <i class="fas fa-bars"></i>
</button>

<div id="sidebar" class="sidebar bg-dark text-white">
    <h4 class="text-center py-3">Admin Panel</h4>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-white <?= ($current_route == BASE_URL . '/admin/dashboard') ? 'active' : '' ?>"
                href="<?= BASE_URL ?>/admin/dashboard">
                <i class="fas fa-home"></i> Inicio
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white <?= (strpos($current_route, '/admin/dashboard/pagos') !== false) ? 'active' : '' ?>"
                href="<?= BASE_URL ?>/admin/dashboard/pagos">
                <i class="fas fa-money-check-alt"></i> Pagos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white <?= (strpos($current_route, '/admin/dashboard/usuarios') !== false) ? 'active' : '' ?>"
                href="<?= BASE_URL ?>/admin/dashboard/usuarios">
                <i class="fas fa-users"></i> Usuarios
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white <?= (strpos($current_route, '/admin/dashboard/reporte') !== false) ? 'active' : '' ?>"
                href="<?= BASE_URL ?>/admin/dashboard/reporte">
                <i class="fas fa-chart-bar"></i> Reportes
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white <?= (strpos($current_route, '/auth/logout') !== false) ? 'active' : '' ?>"
                href="<?= BASE_URL ?>/auth/logout">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </a>
        </li>
    </ul>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById("sidebar");
        const toggleButton = document.getElementById("sidebarToggle");

        toggleButton.addEventListener("click", function () {
            sidebar.classList.toggle("show");
        });

        // Cerrar el sidebar si se toca fuera de él en móviles
        document.addEventListener("click", function (event) {
            if (window.innerWidth < 768 && !sidebar.contains(event.target) && !toggleButton.contains(event.target)) {
                sidebar.classList.remove("show");
            }
        });
    });
</script>
