@extends('components.layouts.student')

@section('title', 'Dashboard Estudiante')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @livewire('student.dashboard-overview')
@endsection