<nav class="sidebar flex-shrink-0 p-3 collapse d-lg-block" id="sidebarMenu">
    <a href="#" class="d-flex align-items-center mb-4 text-white text-decoration-none">
        <img src="{{ asset('img/amisam.png') }}" alt="AMISAM" style="height: 2rem; margin-right: .5rem;">
        <span class="fs-5 fw-bold">AMISAM</span>
    </a>

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('student.dashboard') }}"
                class="nav-link d-flex align-items-center @if(request()->routeIs('student.dashboard')) active @endif">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>
        <li><a href="{{route('student.courses')}}" class="nav-link d-flex align-items-center"><i
                    class="bi bi-journal-bookmark-fill me-2"></i> Mis
                Cursos</a></li>
        <li><a href="{{route('student.documents')}}" class="nav-link d-flex align-items-center"><i
                    class="bi bi-file-earmark-text-fill me-2"></i> Mis
                Documentos</a></li>
        <li><a href="{{ route('student.payments') }}" class="nav-link d-flex align-items-center"><i
                    class="bi bi-credit-card-2-front-fill me-2"></i> Pagos</a></li>
        <li><a href="{{ route('student.enrollments') }}" class="nav-link d-flex align-items-center"><i
                    class="bi bi-credit-card-2-front-fill me-2"></i> Matrículas</a></li>
        <li><a href="{{route('student.grades.index')}}" class="nav-link d-flex align-items-center"><i
                    class="bi bi-graph-up-arrow me-2"></i> Mis
                Notas</a></li>
        <li><a href="{{route('student.profile.edit')}}" class="nav-link d-flex align-items-center"><i
                    class="bi bi-gear-fill me-2"></i> Perfil</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="nav-link btn btn-link d-flex align-items-center w-100 text-start text-white p-0 mt-3">
                    <i class="bi bi-box-arrow-right me-2"></i> Salir
                </button>
            </form>
        </li>
    </ul>
</nav>