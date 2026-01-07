@extends('components.layouts.admin')

@section('title', 'Métodos de Pago')

@section('content')
    <h1 class="mb-4">Métodos de Pago</h1>
    @livewire('admin.payment-methods-table')
@endsection