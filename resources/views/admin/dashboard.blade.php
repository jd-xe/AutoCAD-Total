@extends('components.layouts.admin')

@section('title', 'Dashboard Admin')

@push('styles')
    <style>
        /* En tu stack('styles') o archivo CSS */
        .stats-card {
            border-radius: 0.75rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .stats-card:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .stats-card-icon {
            font-size: 2rem;
            opacity: 0.15;
            position: absolute;
            bottom: 1rem;
            right: 1rem;
        }

        .table-responsive table {
            transition: background 0.2s ease;
        }

        .table-responsive table tr:hover {
            background-color: #f1f1f1;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .content-fade-in {
            animation: fadeInUp 0.5s ease-out both;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Dashboard de Administración</h1>

        <div class="row g-4 mb-5">
            @livewire('admin.stats-card', ['type' => 'students'])
            @livewire('admin.stats-card', ['type' => 'courses'])
            @livewire('admin.stats-card', ['type' => 'groups'])
            @livewire('admin.stats-card', ['type' => 'payments'])
        </div>

        <div class="row g-4 mb-5">
            @livewire('admin.stats-card', ['type' => 'approved_payments'])
            @livewire('admin.stats-card', ['type' => 'documents'])
        </div>

        @livewire('admin.recent-enrollments-table')
    </div>

@endsection