@extends('components.layouts.student')

@section('title', 'Mis Documentos')

@section('content')
    <div class="container">
        <h1 class="mb-4">Mis Documentos</h1>

        @if($documents->isEmpty())
            <div class="alert alert-info">
                No tienes documentos generados aún.
            </div>
        @else
            <div class="row g-4">
                @foreach($documents as $doc)
                    <div class="col-md-6">
                        <div class="card bg-dark text-white h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">
                                    {{ ucfirst($doc->type) }} -
                                    {{ $doc->courseGroup->course->name ?? 'Curso no asignado' }}
                                </h5>
                                <p class="card-text mb-2">
                                    Estado:
                                    <span class="badge 
                                                                            @if($doc->status == 'issued') bg-success
                                                                            @elseif($doc->status == 'verified') bg-primary
                                                                            @elseif($doc->status == 'pending') bg-warning
                                                                                @else bg-danger
                                                                            @endif
                                                                        ">
                                        {{ ucfirst($doc->status) }}
                                    </span>
                                </p>
                                <p class="card-text mb-4">
                                    Fecha: {{ $doc->created_at->format('d/m/Y') }}
                                </p>
                                @if(in_array($doc->status, ['issued', 'verified']))
                                    <a href="{{ $doc->document_url }}" target="_blank" class="btn btn-accent mt-auto">
                                        Ver / Descargar
                                    </a>
                                @else
                                    <button class="btn btn-secondary mt-auto" disabled>
                                        No disponible
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection