<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>@yield('title', 'Los mejores cursos de Autocad')</title>

<meta name="language" content="spanish">
<meta name="author" content="Amisam">
<meta name="description" content="Aprende AutoCAD desde cero hasta nivel profesional.">
<meta name="keywords" content="Curso, AutoCAD, Aprende">
<meta name="robots" content="index, all, follow">
<meta name="copyright" content="Pagina web amisam.com">

<link rel="icon" href="{{ asset('img/amisam.png') }}" type="image/png">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{asset('css/header.css')}}">
<link rel="stylesheet" href="{{asset('css/slider.css')}}">
<link rel="stylesheet" href="{{asset('css/benefit.css')}}">
<link rel="stylesheet" href="{{asset('css/courses.css')}}">
<link rel="stylesheet" href="{{asset('css/level_courses.css')}}">
<link rel="stylesheet" href="{{asset('css/testimonios.css')}}">
<link rel="stylesheet" href="{{asset('css/inscribite.css')}}">
<link rel="stylesheet" href="{{asset('css/index.css')}}">
<link rel="stylesheet" href="{{asset('css/footer.css')}}">
<link rel="stylesheet" href="{{asset('css/form_container.css')}}">
<link rel="stylesheet" href="{{asset('css/contacto.css')}}">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        
        /* FONDO NUEVO: Oscuro con luces sutiles */
        background-color: #0f172a; /* Azul muy oscuro de base */
        background-image: 
            radial-gradient(circle at 15% 50%, rgba(79, 70, 229, 0.08) 0%, transparent 25%), 
            radial-gradient(circle at 85% 30%, rgba(124, 58, 237, 0.08) 0%, transparent 25%);
        
        color: #fff; /* Texto base blanco */
        overflow-x: hidden;
        min-height: 100vh;
    }
    
    /* Scrollbar moderna */
    ::-webkit-scrollbar { width: 10px; }
    ::-webkit-scrollbar-track { background: #0f172a; }
    ::-webkit-scrollbar-thumb { background: #475569; border-radius: 5px; }
    ::-webkit-scrollbar-thumb:hover { background: #4f46e5; }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@livewireStyles
@livewireScripts