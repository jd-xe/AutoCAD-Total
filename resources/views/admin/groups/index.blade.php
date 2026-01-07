@extends('components.layouts.admin')

@section('title', 'Grupos')

@section('content')
    <h1 class="mb-4">Gestión de Grupos</h1>
    @livewire('admin.course-groups-table')
@endsection