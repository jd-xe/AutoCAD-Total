<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard Estudiante')</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/amisam.png')}}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    @livewireStyles

    <style>
        body {
            background-color: #1f1f1f;
            color: #eee;
        }

        .sidebar {
            background: #212121;
            min-width: 250px;
            height: 100vh;
        }

        .sidebar .nav-link {
            color: #ccc;
            border-radius: 0.5rem;
            transition: all 0.2s ease-in-out;
            margin-bottom: 0.25rem;
        }

        .sidebar .nav-link:hover {
            background: #333;
            color: #fff;
        }

        .sidebar .nav-link.active {
            background: #c00;
            color: #fff;
        }

        .sidebar .nav-link i {
            font-size: 1.1rem;
        }

        .btn-accent {
            background: #c00;
            color: #fff;
        }

        header {
            z-index: 1000;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                position: fixed;
                top: 56px;
                left: 0;
                width: 100%;
                height: calc(100% - 56px);
                z-index: 999;
                overflow-y: auto;
            }
        }
    </style>
</head>

<body>

    <header class="d-flex d-lg-none bg-dark p-2 align-items-center">
        <button class="btn btn-outline-light" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
            <i class="bi bi-list"></i>
        </button>
        <span class="ms-2 text-white fs-5 fw-bold">AMISAM</span>
    </header>

    <div class="d-flex">
        @include('components.layouts.partials.sidebar-student')

        <main class="flex-grow-1 p-3">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
    @stack('scripts')
</body>

</html>