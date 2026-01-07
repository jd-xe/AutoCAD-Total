<nav class="sidebar flex-shrink-0 p-3 collapse d-lg-block" id="sidebarMenu"
    style="background: #343a40; min-width: 250px; height: 100vh;">
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('admin.dashboard') }}"
            class="d-flex align-items-center text-white text-decoration-none w-100">
            <i class="bi bi-shield-lock-fill fs-4 me-2"></i>
            <span class="fs-5 fw-bold">Panel Admin</span>
        </a>
        <button class="btn btn-sm btn-outline-light d-lg-none ms-auto" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item mb-1">
            <a href="{{ route('admin.dashboard') }}"
                class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : 'text-white' }}">
                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard
            </a>
        </li>

        {{-- Académico --}}
        <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#menuAcademico" role="button"
                aria-expanded="{{ request()->is('admin/courses*') || request()->is('admin/groups*') || request()->is('admin/enrollments*') ? 'true' : 'false' }}">
                <i class="bi bi-journals me-2"></i> Académico
            </a>
            <div class="collapse {{ request()->is('admin/courses*') || request()->is('admin/groups*') || request()->is('admin/enrollments*') || request()->is('admin/schedules*') ? 'show' : '' }}"
                id="menuAcademico">
                <ul class="btn-toggle-nav list-unstyled fw-normal ps-4">
                    <li><a href="{{ route('admin.courses.index') }}"
                            class="nav-link {{ request()->routeIs('admin.courses.*') ? 'active' : 'text-white' }}">
                            Cursos
                        </a></li>
                    <li><a href="{{ route('admin.groups.index') }}"
                            class="nav-link {{ request()->routeIs('admin.groups.*') ? 'active' : 'text-white' }}">
                            Grupos
                        </a></li>
                    <li><a href="{{ route('admin.schedules.index') }}"
                            class="nav-link {{ request()->routeIs('admin.schedules.*') ? 'active' : 'text-white' }}">
                            Horarios </a></li>
                    <li><a href="{{ route('admin.enrollments.index') }}"
                            class="nav-link {{ request()->routeIs('admin.enrollments.*') ? 'active' : 'text-white' }}">
                            Matrículas
                        </a></li>
                </ul>
            </div>
        </li>

        {{-- Finanzas --}}
        <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#menuFinanzas" role="button"
                aria-expanded="{{ request()->is('admin/payments*') || request()->is('admin/payment_concepts*') || request()->is('admin/payment_methods*') ? 'true' : 'false' }}">
                <i class="bi bi-credit-card-2-front-fill me-2"></i> Finanzas
            </a>
            <div class="collapse {{ request()->is('admin/payments*') || request()->is('admin/payment_concepts*') || request()->is('admin/payment_methods*') ? 'show' : '' }}"
                id="menuFinanzas">
                <ul class="btn-toggle-nav list-unstyled fw-normal ps-4">
                    <li><a href="{{ route('admin.payments') }}"
                            class="nav-link {{ request()->routeIs('admin.payments') ? 'active' : 'text-white' }}">
                            Pagos
                        </a></li>
                    <li><a href="{{ route('admin.payment_concepts.index') }}"
                            class="nav-link {{ request()->routeIs('admin.payment_concepts.*') ? 'active' : 'text-white' }}">
                            Conceptos
                        </a></li>
                    <li><a href="{{ route('admin.payment_methods.index') }}"
                            class="nav-link {{ request()->routeIs('admin.payment_methods.*') ? 'active' : 'text-white' }}">
                            Métodos
                        </a></li>
                </ul>
            </div>
        </li>

        {{-- Recursos --}}
        <li class="nav-item mb-1">
            <a href="{{ route('admin.resources.index') }}"
                class="nav-link {{ request()->routeIs('admin.resources.*') ? 'active' : 'text-white' }}">
                <i class="bi bi-folder2-open me-2"></i> Recursos
            </a>
        </li>

        {{-- Evaluaciones --}}
        <li class="nav-item mb-1">
            <a href="{{-- route('admin.grades.index') --}}"
                class="nav-link {{ request()->routeIs('admin.grades.*') ? 'active' : 'text-white' }}">
                <i class="bi bi-journal-check me-2"></i> Evaluaciones
            </a>
        </li>

        {{-- Usuarios --}}
        <li class="nav-item mb-1">
            <a href="{{ route('admin.users.index') }}"
                class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : 'text-white' }}">
                <i class="bi bi-people-fill me-2"></i> Usuarios
            </a>
        </li>

        {{-- Reportes --}}
        <li class="nav-item mb-4">
            <a href="{{ route('admin.reports.enrollments') }}" class="nav-link text-white">
                <i class="bi bi-file-earmark-spreadsheet me-2"></i>
                Reporte Matrículas
            </a>
        </li>


        {{-- Salir --}}
        <li class="nav-item mt-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light w-100 text-start">
                    <i class="bi bi-box-arrow-right me-2"></i> Salir
                </button>
            </form>
        </li>
    </ul>

    <style>
        .sidebar .nav-link {
            border-radius: 0.5rem;
            transition: background 0.2s;
        }

        .sidebar .nav-link.text-white:hover {
            background: #495057;
            color: #fff;
        }

        .sidebar .nav-link.active {
            background: #c00;
            color: #fff;
        }
    </style>
</nav>