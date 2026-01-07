@extends('components.layouts.welcome')

@section('title', 'Los mejores cursos de AutoCAD')

@section('content')
    <div>
        @include('home.partials.slider')
    </div>
    <section>@include('home.partials.partners')</section>
    <section>@include('home.partials.beneficios')</section>
    <section>@include('home.partials.courses')</section>
    <section>@include('home.partials.level_cursos')</section>
    <section>@include('home.partials.testimonios')</section>
    <section>@include('home.partials.inscribete')</section>
    </main>
    <footer>
        @include('home.partials.footer')
    </footer>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const overlay = document.getElementById('session-overlay');
            const btn = document.getElementById('close-session-overlay');
            if (overlay && btn) {
                btn.addEventListener('click', () => overlay.remove());
                // opcional: cierra también si pinchan fuera de la alerta
                overlay.addEventListener('click', e => {
                    if (e.target === overlay) overlay.remove();
                });
            }
        });
    </script>
@endpush