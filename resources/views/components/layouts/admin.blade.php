<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Admin')</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/amisam.png')}}">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    {{-- Livewire Styles --}}
    @livewireStyles

    {{-- Se pueden añadir estilos específicos por vista --}}
    @stack('styles')

    <style>
        body {
            background: #f8f9fa;
        }

        .main-content {
            overflow-y: auto;
        }
    </style>
</head>

<body class="vh-100 d-flex flex-column">

    {{-- Header móvil --}}
    <nav class="navbar navbar-dark bg-dark d-lg-none">
        <div class="container-fluid">
            <button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
                <i class="bi bi-list fs-3"></i>
            </button>
            <span class="navbar-brand mb-0 h1">Panel Admin</span>
        </div>
    </nav>

    <div class="d-flex flex-grow-1 flex-column flex-lg-row">

        {{-- Sidebar --}}
        @include('components.layouts.partials.sidebar-admin')

        {{-- Contenido principal --}}
        <main class="main-content flex-grow-1 px-3 py-4 px-lg-4 content-fade-in">
            @yield('content')
        </main>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Livewire Scripts --}}
    @livewireScripts

    {{-- Scripts específicos por vista --}}
    @stack('scripts')
</body>

</html>