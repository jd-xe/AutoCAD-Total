<!DOCTYPE html>
<html lang="es">

<head>
    @include('home.partials.head')
    <style>
        .session-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1050;
        }

        .session-alert {
            background: #fff;
            padding: 1.5rem 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            max-width: 90%;
            text-align: center;
        }

        .session-alert.success {
            border-top: 0.25rem solid #28a745;
        }

        .session-alert.error {
            border-top: 0.25rem solid #dc3545;
        }

        #close-session-overlay {
            margin-top: 1rem;
        }
    </style>
    @stack('styles')
</head>

<body>
    @include('home.partials.header')

    <main>
        <div id="floating-buttons-1">
            <a href="https://wa.me/51940277254?text=Hola,%20quisiera%20asesor%C3%ADa%20sobre%20cu%C3%A1l%20es%20el%20nivel%20de%20AutoCAD%20adecuado%20para%20mi%20perfil%20y%20los%20pr%C3%B3ximos%20inicios." target="_blank" class="btn-float btn-whatsapp-1" title="Contáctanos por WhatsApp">
                <i class="bi bi-whatsapp"></i>
            </a>
            <a href="https://calendar.google.com" target="_blank" class="btn-float btn-calendar-1" title="Agenda tu clase">
                <i class="bi bi-calendar-event"></i>
            </a>
            <a href="https://t.me/+51940277254" target="_blank" class="btn-float btn-telegram-1" title="Contáctanos por Telegram">
                <i class="bi bi-telegram"></i>
            </a>
        </div>
        @yield('content')
    </main>

    @if(session('success') || session('error'))
        <div id="session-overlay" class="session-overlay">
            <div class="session-alert {{ session('success') ? 'success' : 'error' }}">
                <p>{{ session('success') ?? session('error') }}</p>
                <button id="close-session-overlay" class="btn btn-sm btn-light">Cerrar</button>
            </div>
        </div>
    @endif
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 800, // Duración de la animación
        once: true,    // Solo animar una vez al bajar
      });
    </script>
    @stack('scripts')
</body>

</html>