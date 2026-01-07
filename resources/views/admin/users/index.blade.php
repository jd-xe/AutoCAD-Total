@extends('components.layouts.admin')

@section('title', 'Usuarios')

@section('content')
    <h1 class="mb-4">Gestión de Usuarios</h1>
    @livewire('admin.users-table')
@endsection