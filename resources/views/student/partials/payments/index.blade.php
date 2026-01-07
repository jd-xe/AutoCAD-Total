@extends('components.layouts.student')

@section('title', 'Pagos - Seleccionar Concepto')

@section('content')
    <div class="container">
        <h1 class="mb-4">Selecciona tu concepto de pago</h1>

        @if($concepts->isEmpty())
            <div class="alert alert-info">
                No hay conceptos de matrícula disponibles en este momento.
            </div>
        @else
            <div id="concept-list" class="row g-4">
                @foreach($concepts as $concept)
                    <div class="col-md-4">
                        <div class="card h-100 bg-dark text-white">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $concept->name }}</h5>
                                <p class="card-text mb-4">Monto: S/ {{ number_format($concept->amount, 2) }}</p>
                                <a href="{{ route('student.payments.upload', $concept->id) }}"
                                    class="btn btn-accent mt-auto btn-select">Seleccionar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    {{-- Tour con Shepherd.js --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tour = new Shepherd.Tour({
                defaultStepOptions: {
                    scrollTo: { behavior: 'smooth', block: 'center' }
                }
            });

            tour.addStep({
                id: 'intro',
                text: '¡Bienvenido! Aquí podrás escoger el concepto de matrícula para tu curso.',
                buttons: [
                    { text: 'Siguiente', action: tour.next }
                ]
            });

            tour.addStep({
                id: 'list',
                text: 'Estos son los conceptos disponibles. Revisa el nombre y monto.',
                attachTo: { element: '#concept-list', on: 'top' },
                buttons: [
                    { text: 'Siguiente', action: tour.next }
                ]
            });

            tour.addStep({
                id: 'select-button',
                text: 'Cuando estés listo, haz clic en "Seleccionar" para iniciar la subida de tu comprobante.',
                attachTo: { element: '.btn-select:first-child', on: 'bottom' },
                buttons: [
                    { text: 'Finalizar', action: tour.complete }
                ]
            });

            tour.start();
        });
    </script>
@endpush