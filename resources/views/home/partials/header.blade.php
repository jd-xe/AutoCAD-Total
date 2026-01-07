<header>
    <nav class="navbar navbar-expand-lg"> 
        <div class="container"> 
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img id="rotating-logo" src="{{ asset('img/amisam.png') }}" alt="AMISAM">
                <img class="scaled-image" src="{{ asset('img/amisam-name.png') }}" alt="AMISAM TEXTO">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    
                    <!-- INICIO -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            Inicio
                        </a>
                    </li>
                    
                    <!-- NOSOTROS -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('nosotros') ? 'active' : '' }}" href="{{ route('nosotros') }}">
                            Nosotros
                        </a>
                    </li>

                    <!-- NUEVO: DROPDOWN CURSOS ORGANIZADO -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('curso.*') ? 'active' : '' }}" href="#" id="cursosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cursos
                        </a>
                        <ul class="dropdown-menu dropdown-menu-glass" aria-labelledby="cursosDropdown">
                            
                            <!-- Categoría 1: Diseño CAD -->
                            <li>
                                <h6 class="dropdown-header text-uppercase fw-bold" style="color: #60a5fa; font-size: 0.75rem; letter-spacing: 1px;">
                                    Diseño y Dibujo CAD
                                </h6>
                            </li>
                            <li>
                                <a class="dropdown-item ps-4" href="{{ route('curso.basico') }}">
                                    <i class="bi bi-square me-2 text-white-50"></i> AutoCAD Básico
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item ps-4" href="{{ route('curso.intermedio') }}">
                                    <i class="bi bi-exclude me-2 text-white-50"></i> AutoCAD Intermedio
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item ps-4" href="{{ route('curso.avanzado') }}">
                                    <i class="bi bi-boxes me-2 text-white-50"></i> AutoCAD Avanzado
                                </a>
                            </li>

                            <li><hr class="dropdown-divider border-light opacity-10 my-2"></li>

                            <!-- Categoría 2: Diseño Mecánico -->
                            <li>
                                <h6 class="dropdown-header text-uppercase fw-bold" style="color: #facc15; font-size: 0.75rem; letter-spacing: 1px;">
                                    Diseño Mecánico 3D
                                </h6>
                            </li>
                            <li>
                                <!-- Usa rutas reales si las tienes, por ahora # -->
                                <a class="dropdown-item ps-4" href="{{ route('inventor.basic') }}">
                                    <i class="bi bi-gear me-2 text-white-50"></i> Autodesk Inventor Básico
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item ps-4" href="{{ route('inventor.advanced') }}">
                                    <i class="bi bi-gear-fill me-2 text-white-50"></i> Autodesk Inventor Avanzado
                                </a>
                            </li>

                            <li><hr class="dropdown-divider border-light opacity-10 my-2"></li>

                            <!-- Categoría 3: Ingeniería de Producto -->
                            <li>
                                <h6 class="dropdown-header text-uppercase fw-bold" style="color: #f87171; font-size: 0.75rem; letter-spacing: 1px;">
                                    Diseño de Productos
                                </h6>
                            </li>
                            <li>
                                <a class="dropdown-item ps-4" href="{{ route('solidworks.basic') }}">
                                    <i class="bi bi-box me-2 text-white-50"></i> SolidWorks Básico
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item ps-4" href="{{ route('solidworks.advanced') }}">
                                    <i class="bi bi-box-seam me-2 text-white-50"></i> SolidWorks Avanzado
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <!-- EXPERIENCIA -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('eventos') || request()->routeIs('comunidad') ? 'active' : '' }}" href="#" id="expDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Experiencia
                        </a>
                        <ul class="dropdown-menu dropdown-menu-glass" aria-labelledby="expDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('eventos') }}">
                                    <i class="bi bi-calendar-event me-2 text-warning"></i> Eventos y Talleres
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('comunidad') }}">
                                    <i class="bi bi-people-fill me-2 text-info"></i> Comunidad AMISAM
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <!-- CERTIFICADOS -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('certificados') ? 'active' : '' }}" href="{{ route('certificados') }}">
                            Certificados
                        </a>
                    </li>

                    <!-- PAGOS -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pagos') ? 'active' : '' }}" href="{{ route('pagos') }}">
                            Pagos
                        </a>
                    </li>
                    
                    <!-- CONTACTO -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contacto') ? 'active' : '' }}" href="{{ route('contacto') }}">
                            Contacto
                        </a>
                    </li>
                    
                    <!-- LOGIN / LOGOUT -->
                    @auth
                        <li class="nav-item ms-lg-3">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-login-custom btn-sm">
                                    <i class="bi bi-box-arrow-right me-2"></i> Salir
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-login-custom btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                                <i class="bi bi-person-circle me-2"></i> Acceder
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>

<livewire:user.login-form />