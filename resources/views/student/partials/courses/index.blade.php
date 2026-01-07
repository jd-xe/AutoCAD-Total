@extends('components.layouts.student')

@section('title', 'Mis Cursos')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Mis Cursos</h1>

    {{-- Mensaje si no hay cursos --}}
    @if($enrollments->isEmpty())
        <div class="alert alert-info">
            Aún no estás matriculado en ningún curso.
        </div>
    @else
        {{-- Iteramos cada matrícula --}}
        @foreach($enrollments as $enrollment)
            @php
                $group = $enrollment->courseGroup;
                $course = $group->course;
            @endphp

            <div class="card bg-dark text-white mb-5">
                <div class="card-body">

                    {{-- 1. Sección informativa --}}
                    <div class="row mb-4">
                        <div class="col-lg-8">
                            <h3 class="card-title">{{ $course->name }}</h3>
                            <p class="mb-1"><strong>Grupo:</strong> #{{ $group->id }}</p>
                            <p class="mb-1">
                                <strong>Fechas:</strong>
                                {{ \Carbon\Carbon::parse($group->start_date)->format('d/m/Y') }}
                                – 
                                {{ \Carbon\Carbon::parse($group->end_date)->format('d/m/Y') }}
                            </p>
                            <p class="mb-1">
                                <strong>Estado matrícula:</strong>
                                <span class="badge 
                                    {{ $enrollment->status === 'completed' ? 'bg-success' : ($enrollment->status === 'confirmed' ? 'bg-primary' : 'bg-warning') }}">
                                    {{ ucfirst($enrollment->status) }}
                                </span>
                            </p>
                            @if($group->schedules->isNotEmpty())
                                <p class="mb-1"><strong>Horarios:</strong></p>
                                <ul class="list-unstyled mb-0">
                                    @foreach($group->schedules as $s)
                                        <li>
                                            <i class="bi bi-clock me-1"></i>
                                            {{ $s->day }} {{ \Carbon\Carbon::parse($s->start_time)->format('H:i') }}
                                            – {{ \Carbon\Carbon::parse($s->end_time)->format('H:i') }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="col-lg-4 d-flex align-items-center justify-content-center">
                            {{-- Aquí podrías poner una imagen o logo del curso --}}
                            <img src="{{ asset('img/courses/' . Str::slug($course->name) . '.png') }}"
                                 alt="{{ $course->name }}"
                                 class="img-fluid rounded shadow-sm"
                                 style="max-height: 150px;">
                        </div>
                    </div>

                    {{-- 2. Sección de recursos --}}
                    <h5 class="mb-3">Recursos del Curso</h5>
                    @if($group->resources->isEmpty())
                        <div class="alert alert-secondary">
                            No hay materiales disponibles para este curso aún.
                        </div>
                    @else
                        <div class="list-group">
                            @foreach($group->resources as $res)
                                <a href="{{ $res->file_url }}" target="_blank"
                                   class="list-group-item list-group-item-action bg-secondary text-white d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="bi 
                                            @if($res->type==='pdf') bi-file-earmark-pdf-fill 
                                            @elseif($res->type==='ppt') bi-file-earmark-ppt-fill 
                                            @else bi-file-earmark-fill 
                                            @endif me-2"></i>
                                        {{ $res->name }}
                                        <small class="text-muted">({{ strtoupper($res->type) }})</small>
                                    </div>
                                    <i class="bi bi-download"></i>
                                </a>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
