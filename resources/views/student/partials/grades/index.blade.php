@extends('components.layouts.student')

@section('title', 'Mis Notas')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4">Mis Notas</h1>

        @if($grades->isEmpty())
            <div class="alert alert-info">
                Aún no tienes calificaciones registradas.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-dark table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Curso</th>
                            <th>Grupo</th>
                            <th>Evaluación</th>
                            <th>Nota</th>
                            <th>Comentarios</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($grades as $grade)
                            <tr>
                                <td>{{ $grade->courseGroup->course->name }}</td>
                                <td>#{{ $grade->course_group_id }}</td>
                                <td>{{ ucfirst($grade->evaluation_type) }}</td>
                                <td>
                                    <span class="badge 
                                                            {{ $grade->score >= 11 ? 'bg-success' : 'bg-danger' }}">
                                        {{ number_format($grade->score, 2) }}
                                    </span>
                                </td>
                                <td>{{ $grade->comments ?? '-' }}</td>
                                <td>{{ $grade->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection