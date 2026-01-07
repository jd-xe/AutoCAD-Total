@extends('components.layouts.admin')

@section('title', 'Cursos')

@section('content')
    <h1 class="mb-4">Gestión de Cursos</h1>
    @livewire('admin.courses-table')
@endsection