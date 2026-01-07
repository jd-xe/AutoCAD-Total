@extends('components.layouts.admin')

@section('title', 'Matrículas')

@section('content')
    <h1 class="mb-4">Gestión de Matrículas</h1>
    @livewire('admin.enrollments-table')
@endsection