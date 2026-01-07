@extends('components.layouts.admin')

@section('title', 'Horarios')

@section('content')
    <h1 class="mb-4">Gestión de Horarios</h1>
    @livewire('admin.schedules-table')
@endsection