<div id="partners-infinite-marquee">
    <div class="container mb-4">
        <p class="text-center text-uppercase text-light opacity-50 small" style="letter-spacing: 3px;">
            Confían en nosotros y nuestros estándares
        </p>
    </div>
    
    <div class="pm-slider">
        <div class="pm-slide-track">
            
            <!-- GRUPO 1 -->
            <!-- Agregamos data-name="Texto a mostrar" -->
            <div class="pm-slide" data-name="Autodesk Authorized">
                <img src="{{ asset('img/logo-autodesk.png') }}" alt="Autodesk">
            </div>
            <div class="pm-slide" data-name="Colegio de Ingenieros">
                <img src="{{ asset('img/logo-cip.png') }}" alt="CIP">
            </div>
            <div class="pm-slide" data-name="Colegio de Arquitectos">
                <img src="{{ asset('img/logo-cap.png') }}" alt="CAP">
            </div>
            <div class="pm-slide" data-name="Universidad Nacional de Ingeniería">
                <img src="{{ asset('img/logo-uni.png') }}" alt="UNI">
            </div>
            <div class="pm-slide" data-name="AutoCAD Certified">
                <img src="{{ asset('img/logo-autocad.png') }}" alt="AutoCAD">
            </div>

            <!-- GRUPO 2 (Duplicados - IMPORTANTE: Copiar también los data-name) -->
            <div class="pm-slide" data-name="Autodesk Authorized">
                <img src="{{ asset('img/logo-autodesk.png') }}" alt="Autodesk">
            </div>
            <div class="pm-slide" data-name="Colegio de Ingenieros">
                <img src="{{ asset('img/logo-cip.png') }}" alt="CIP">
            </div>
            <div class="pm-slide" data-name="Colegio de Arquitectos">
                <img src="{{ asset('img/logo-cap.png') }}" alt="CAP">
            </div>
            <div class="pm-slide" data-name="Universidad Nacional de Ingeniería">
                <img src="{{ asset('img/logo-uni.png') }}" alt="UNI">
            </div>
             <div class="pm-slide" data-name="AutoCAD Certified">
                <img src="{{ asset('img/logo-autocad.png') }}" alt="AutoCAD">
            </div>

        </div>
    </div>
</div>

<style>
    #partners-infinite-marquee {
        background: rgba(0, 0, 0, 0.4);
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        padding: 50px 0;
        overflow: hidden;
        position: relative;
        width: 100%;
    }

    #partners-infinite-marquee::before,
    #partners-infinite-marquee::after {
        content: "";
        position: absolute;
        top: 0;
        width: 150px;
        height: 100%;
        z-index: 2;
        pointer-events: none;
    }

    #partners-infinite-marquee::before {
        left: 0;
        background: linear-gradient(to right, #0f172a, transparent);
    }

    #partners-infinite-marquee::after {
        right: 0;
        background: linear-gradient(to left, #0f172a, transparent);
    }

    .pm-slider {
        margin: auto;
        overflow: hidden;
        position: relative;
        width: 100%;
        padding-top: 20px; /* Espacio extra para el tooltip arriba */
    }

    .pm-slide-track {
        display: flex;
        width: calc(250px * 12); 
        animation: pm-scroll-animation 40s linear infinite;
    }

    /* --- ESTILOS DE LA CAJA DEL LOGO (Modificados para Tooltip) --- */
    .pm-slide {
        height: 80px;
        width: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 30px;
        position: relative; /* Necesario para posicionar el tooltip */
    }

    .pm-slide img {
        max-height: 50px;
        max-width: 100%;
        filter: grayscale(100%) opacity(0.5);
        transition: all 0.3s ease;
        box-shadow: none; 
        border: none;
        border-radius: 0;
    }

    /* --- LÓGICA DEL TOOLTIP CSS --- */
    
    /* El cuadrito de texto */
    .pm-slide::before {
        content: attr(data-name); /* Toma el texto del HTML */
        position: absolute;
        top: -15px; /* Lo coloca arriba del logo */
        left: 50%;
        transform: translateX(-50%) translateY(10px); /* Centrado y bajado ligeramente */
        
        background: rgba(79, 70, 229, 0.9); /* Fondo morado semitransparente */
        color: white;
        font-family: 'Poppins', sans-serif;
        font-size: 0.75rem;
        font-weight: 500;
        white-space: nowrap; /* Que no se rompa el texto */
        padding: 5px 12px;
        border-radius: 20px;
        border: 1px solid rgba(255,255,255,0.2);
        
        opacity: 0; /* Invisible por defecto */
        visibility: hidden;
        transition: all 0.3s ease;
        pointer-events: none;
        z-index: 10;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }

    /* El triangulito abajo del texto */
    .pm-slide::after {
        content: '';
        position: absolute;
        top: 10px; /* Justo debajo del texto */
        left: 50%;
        transform: translateX(-50%) translateY(10px);
        
        border-width: 5px;
        border-style: solid;
        border-color: rgba(79, 70, 229, 0.9) transparent transparent transparent;
        
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 10;
    }

    /* --- ACCIÓN AL PASAR EL MOUSE --- */

    .pm-slide-track:hover {
        animation-play-state: paused;
    }

    /* Cuando pasas el mouse sobre UN slide específico */
    .pm-slide:hover img {
        filter: grayscale(0%) opacity(1);
        transform: scale(1.1);
        cursor: pointer;
    }

    /* Mostrar Tooltip */
    .pm-slide:hover::before,
    .pm-slide:hover::after {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(0); /* Sube a su posición original */
    }

    @keyframes pm-scroll-animation {
        0% { transform: translateX(0); }
        100% { transform: translateX(calc(-250px * 6)); }
    }
    
    @media (max-width: 768px) {
        #partners-infinite-marquee::before, #partners-infinite-marquee::after { width: 50px; }
        .pm-slide { width: 150px; padding: 0 15px; }
        .pm-slide-track { width: calc(150px * 12); }
        @keyframes pm-scroll-animation {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(-150px * 6)); }
        }
        /* En celular a veces el tooltip estorba, opcionalmente puedes ocultarlo: */
        /* .pm-slide::before, .pm-slide::after { display: none; } */
    }
</style>