@extends('components.layouts.admin')

@section('title','Recursos')

@section('content')
  <h1 class="mb-4">Gestión de Recursos</h1>
  @livewire('admin.resources-table')
@endsection
