@extends('components.layouts.welcome')

@section('title', 'Verificación de Certificados | AMISAM')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/certificates.css') }}">
@endpush

@section('content')
<div class="crt-page-wrapper">
    
    <div class="container pt-5">
        
        <!-- Header -->
        <div class="text-center mb-5" data-aos="fade-down">
            <div class="crt-icon-badge mb-3">
                <i class="bi bi-patch-check-fill"></i>
            </div>
            <h1 class="display-4 fw-bold text-white">Validación de Certificados</h1>
            <p class="text-white-50 lead mx-auto" style="max-width: 600px;">
                Ingresa el número de DNI para verificar la autenticidad de los diplomas emitidos por AMISAM.
            </p>
        </div>

        <!-- Buscador -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 col-md-8" data-aos="zoom-in" data-aos-delay="100">
                <div class="crt-search-box p-4">
                    <form id="crtForm" onsubmit="buscarCertificado(event)">
                        <label class="form-label text-white-50 mb-2">Número de DNI</label>
                        <div class="input-group">
                            <input type="text" id="crtDniInput" class="form-control crt-input" placeholder="Ej: 87654321" maxlength="8" pattern="\d{8}" required autocomplete="off">
                            <button type="submit" class="btn crt-btn-search">
                                <i class="bi bi-search me-2"></i> Consultar
                            </button>
                        </div>
                        <div class="form-text text-white-50 mt-2">
                            <i class="bi bi-info-circle me-1"></i> Solo ingresa los 8 dígitos numéricos.
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Resultados (Oculto por defecto) -->
        <div id="crtResultContainer" class="row justify-content-center d-none pb-2">
            <div class="col-lg-8" data-aos="fade-up">
                
                <!-- CASO: ENCONTRADO -->
                <div id="crtFound" class="crt-result-card d-none">
                    <div class="crt-card-header-glass">
                        <i class="bi bi-shield-check-fill text-success fs-4 me-2"></i>
                        <span>Certificado Verificado</span>
                    </div>
                    <div class="crt-card-body-glass p-4 p-md-5">
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center mb-4 mb-md-0">
                                <img src="{{ asset('img/amisam.png') }}" alt="Seal" class="crt-seal">
                            </div>
                            <div class="col-md-9">
                                <h5 class="text-white-50 text-uppercase ls-1 mb-1">Otorgado a:</h5>
                                <h2 class="text-white fw-bold mb-3" id="crtStudentName">Nombre del Estudiante</h2>
                                
                                <div class="crt-details">
                                    <div class="crt-detail-item">
                                        <small>Curso / Programa</small>
                                        <p class="text-info fw-bold mb-0" id="crtCourseName">Nombre del Curso</p>
                                    </div>
                                    <div class="crt-detail-item">
                                        <small>Fecha de Emisión</small>
                                        <p class="text-white mb-0" id="crtIssueDate">01/01/2024</p>
                                    </div>
                                    <div class="crt-detail-item">
                                        <small>Código de Registro</small>
                                        <p class="text-white mb-0 font-monospace" id="crtCertCode">AMI-2024-000</p>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <span class="badge bg-success bg-opacity-25 text-success border border-success px-3 py-2 rounded-pill">
                                        <i class="bi bi-check-circle me-1"></i> Documento Válido
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CASO: NO ENCONTRADO -->
                <div id="crtNotFound" class="crt-error-card text-center d-none">
                    <div class="p-5">
                        <i class="bi bi-x-circle text-danger display-1 mb-3"></i>
                        <h3 class="text-white fw-bold">No se encontraron resultados</h3>
                        <p class="text-white-50">El DNI ingresado <span id="crtErrorDni" class="fw-bold text-white"></span> no registra certificaciones en nuestra base de datos.</p>
                        <button onclick="limpiarBusqueda()" class="btn btn-outline-light rounded-pill mt-3">Intentar de nuevo</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@include('home.partials.footer')
@endsection

@push('scripts')
<script>
    // SIMULACIÓN DE BASE DE DATOS (FRONTEND MOCK)
    const database = [
        { dni: '12345678', nombre: 'JUAN PÉREZ GARCÍA', curso: 'AutoCAD Nivel Avanzado', fecha: '15/10/2023', codigo: 'AMI-23-4589' },
        { dni: '87654321', nombre: 'MARÍA LÓPEZ TORRES', curso: 'Especialización BIM Revit', fecha: '02/11/2023', codigo: 'AMI-23-5102' },
        { dni: '11223344', nombre: 'CARLOS RUIZ MENDOZA', curso: 'Civil 3D aplicado a Vías', fecha: '20/01/2024', codigo: 'AMI-24-0156' }
    ];

    function buscarCertificado(e) {
        e.preventDefault();
        
        const dni = document.getElementById('crtDniInput').value;
        const container = document.getElementById('crtResultContainer');
        const foundCard = document.getElementById('crtFound');
        const notFoundCard = document.getElementById('crtNotFound');
        
        // Resetear vista
        container.classList.add('d-none');
        foundCard.classList.add('d-none');
        notFoundCard.classList.add('d-none');

        // Simular carga
        setTimeout(() => {
            const resultado = database.find(item => item.dni === dni);
            
            container.classList.remove('d-none');
            
            if (resultado) {
                // Llenar datos con los nuevos IDs
                document.getElementById('crtStudentName').textContent = resultado.nombre;
                document.getElementById('crtCourseName').textContent = resultado.curso;
                document.getElementById('crtIssueDate').textContent = resultado.fecha;
                document.getElementById('crtCertCode').textContent = resultado.codigo;
                
                // Mostrar tarjeta de éxito
                foundCard.classList.remove('d-none');
            } else {
                // Mostrar error
                document.getElementById('crtErrorDni').textContent = dni;
                notFoundCard.classList.remove('d-none');
            }
        }, 300);
    }

    function limpiarBusqueda() {
        document.getElementById('crtDniInput').value = '';
        document.getElementById('crtResultContainer').classList.add('d-none');
        document.getElementById('crtDniInput').focus();
    }
</script>
@endpush