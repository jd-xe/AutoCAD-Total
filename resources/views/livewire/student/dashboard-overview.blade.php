<div class="container">
    <h2 class="mb-4">¡Hola, {{ auth()->user()->first_name }}!</h2>

    <div class="row gy-4">

        {{-- Tarjeta: Curso y Grupo --}}
        <div class="col-md-6">
            <div class="card bg-dark text-white h-100">
                <div class="card-body">
                    <h5 class="card-title">Mi Curso</h5>
                    @if($enrollment && $enrollment->courseGroup)
                        <p class="card-text">
                            <strong>{{ $enrollment->courseGroup->course->name }}</strong><br>
                            Grupo #{{ $enrollment->courseGroup->id }}<br>
                            Inicio: {{ \Carbon\Carbon::parse($enrollment->courseGroup->start_date)->format('d/m/Y') }}<br>
                            Fin: {{ \Carbon\Carbon::parse($enrollment->courseGroup->end_date)->format('d/m/Y') }}
                        </p>
                    @else
                        <p class="card-text">Aún no has completado tu matrícula.</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Tarjeta: Estado de Pago --}}
        <div class="col-md-6">
            <div class="card bg-dark text-white h-100">
                <div class="card-body">
                    <h5 class="card-title">Estado de Pago</h5>
                    @if($payment)
                        <p class="card-text">
                            Concepto: {{ $payment->concept->name }}<br>
                            Monto: S/ {{ number_format($payment->amount, 2) }}<br>
                            Estado:
                            <span class="badge 
                                                        @if($payment->status == 'approved') bg-success
                                                        @elseif($payment->status == 'pending') bg-warning
                                                            @else bg-danger
                                                        @endif
                                                    ">
                                {{ ucfirst($payment->status) }}
                            </span>
                        </p>
                    @else
                        <p class="card-text">No hay pago asociado.</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Enlaces a subsecciones --}}
        <div class="col-12">
            <div class="d-flex flex-wrap gap-3">
                <a href="{{ route('student.enrollments') }}" class="btn btn-outline-light">
                    <i class="bi bi-journal-bookmark me-1"></i> Mis Cursos
                </a>
                <a href="{{ route('student.payments') }}" class="btn btn-outline-light">
                    <i class="bi bi-credit-card-2-front-fill me-1"></i> Pagos
                </a>
                <a href="#" class="btn btn-outline-light">
                    <i class="bi bi-file-earmark-text me-1"></i> Mis Documentos
                </a>
                <a href="#" class="btn btn-outline-light">
                    <i class="bi bi-graph-up me-1"></i> Notas
                </a>
                <a href="#" class="btn btn-outline-light">
                    <i class="bi bi-envelope-fill me-1"></i> Mensajes
                </a>
                <a href="#" class="btn btn-outline-light">
                    <i class="bi bi-gear-fill me-1"></i> Perfil
                </a>
            </div>
        </div>

    </div>
</div>