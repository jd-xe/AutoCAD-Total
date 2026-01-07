@extends('components.layouts.student')

@section('title', 'Completar Matrícula')

@section('content')
    <div class="container">
        <h1 class="mb-4">Elige tu Grupo</h1>

        @if(isset($notice))
            <div class="alert alert-info">
                {{ $notice }}
            </div>
        @elseif($groups->isEmpty())
            <div class="alert alert-warning">
                Lo sentimos, no hay grupos activos para este curso por ahora.
            </div>
        @else
            <div id="group-list" class="row g-4">
                @foreach($groups as $group)
                    <div class="col-md-6">
                        <div class="card bg-dark text-white h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">
                                    Grupo #{{ $group->id }}
                                </h5>
                                <p class="card-text mb-2">
                                    Inicio: {{ $group->start_date->format('d/m/Y') }}<br>
                                    Fin: {{ $group->end_date->format('d/m/Y') }}
                                </p>
                                <p class="card-text">
                                    Cupo: {{ $group->enrollments_count }} / {{ $group->max_capacity ?? '∞' }}
                                </p>
                                <p class="card-text">
                                    <strong>Horarios:</strong><br>
                                    @if($group->schedules->isNotEmpty())
                                        @foreach($group->schedules as $schedule)
                                            {{ $schedule->day }}: {{ $schedule->start_time }} - {{ $schedule->end_time }}<br>
                                        @endforeach
                                    @else
                                        No hay horarios asignados.
                                    @endif
                                </p>
                                <form method="POST" action="{{ route('student.enrollments.store') }}" class="mt-auto">
                                    @csrf
                                    <input type="hidden" name="group_id" value="{{ $group->id }}">
                                    <button type="submit" class="btn btn-accent btn-select">
                                        Seleccionar este grupo
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    {{-- TOUR con Shepherd.js --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Solo la primera vez
            if (!localStorage.getItem('tourSelectGroupViewed')) {
                const tour = new Shepherd.Tour({
                    defaultStepOptions: {
                        scrollTo: { behavior: 'smooth', block: 'center' }
                    }
                });

                tour.addStep({
                    id: 'intro-select-group',
                    text: 'Aquí debes elegir uno de los grupos disponibles para tu curso.',
                    buttons: [{ text: 'Siguiente', action: tour.next }]
                });

                tour.addStep({
                    id: 'list-groups',
                    text: 'Revisa las fechas de inicio/fin y la cantidad de inscritos.',
                    attachTo: { element: '#group-list', on: 'top' },
                    buttons: [{ text: 'Siguiente', action: tour.next }]
                });

                tour.addStep({
                    id: 'btn-select-group',
                    text: 'Cuando estés listo, haz clic en "Seleccionar este grupo".',
                    attachTo: { element: '.btn-select:first-child', on: 'bottom' },
                    buttons: [{ text: 'Finalizar', action: tour.complete }]
                });

                tour.on('complete', () => {
                    localStorage.setItem('tourSelectGroupViewed', 'yes');
                });

                tour.start();
            }
        });
    </script>
@endpush