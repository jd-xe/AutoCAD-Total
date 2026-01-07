@extends('components.layouts.student')

@section('title', 'Subir Comprobante de Pago')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Sube tu comprobante de pago</h2>

        {{-- Alertas --}}
        @if(session('info'))
            <div class="alert alert-info">{{ session('info') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row g-4">
            {{-- Columna izquierda: QR e instrucciones --}}
            <div class="col-lg-5">
                <div class="card bg-dark text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Paga con Yape</h5>
                        <p>Código QR:</p>
                        <div class="text-center mb-3">
                            <img src="https://res.cloudinary.com/doy35yjhq/image/upload/fl_preserve_transparency/v1739248520/qr_1_hcnzcz.jpg?_s=public-apps"
                                alt="QR Yape" class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                        </div>
                        <p class="small">
                            Escanea el código con tu aplicación Yape y realiza el pago al monto correspondiente.
                            Luego descarga o captura tu comprobante y súbelo aquí.
                        </p>
                        <hr class="border-secondary">
                        <p class="mb-1"><strong>Monto a pagar:</strong> S/ {{ number_format($concept->amount, 2) }}</p>
                        <p class="mb-0"><strong>Concepto:</strong> {{ $concept->name }}</p>
                    </div>
                </div>
            </div>

            {{-- Columna derecha: Formulario --}}
            <div class="col-lg-7">
                <div class="card bg-dark text-white h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Formulario de subida</h5>

                        <form method="POST" action="{{ route('student.payments.store') }}" enctype="multipart/form-data"
                            class="mt-3 flex-grow-1 d-flex flex-column">
                            @csrf

                            {{-- Hidden: concept_id --}}
                            <input type="hidden" name="concept_id" value="{{ $concept->id }}">

                            {{-- Método de pago --}}
                            <div class="mb-3">
                                <label for="payment_method_id" class="form-label">Método de Pago</label>
                                <select name="payment_method_id" id="payment_method_id"
                                    class="form-select @error('payment_method_id') is-invalid @enderror" required>
                                    <option value="">-- Elige Método --</option>
                                    @foreach(\App\Models\PaymentMethod::all() as $method)
                                        <option value="{{ $method->id }}" @selected(old('payment_method_id') == $method->id)>
                                            {{ $method->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('payment_method_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Input de archivo --}}
                            <div class="mb-3">
                                <label for="receipt" class="form-label">Comprobante (PNG/JPG)</label>
                                <input class="form-control @error('receipt') is-invalid @enderror" type="file" id="receipt"
                                    name="receipt" accept="image/png,image/jpeg" required>
                                @error('receipt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">
                                    Máx. 3 MB. Formatos permitidos: .jpg, .jpeg, .png.
                                </div>
                            </div>

                            {{-- Preview de imagen --}}
                            <div id="preview-container" class="mb-3 d-none">
                                <p class="mb-1"><strong>Preview:</strong></p>
                                <img id="preview-image" src="#" alt="Preview" class="img-fluid rounded shadow-sm">
                            </div>

                            {{-- Botones --}}
                            <div class="mt-auto d-flex justify-content-between">
                                <a href="{{ route('student.dashboard') }}" class="btn btn-outline-light">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn btn-accent">
                                    Subir y Enviar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script para preview de imagen --}}
    @push('scripts')
        <script>
            document.getElementById('receipt').addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = function (ev) {
                    const img = document.getElementById('preview-image');
                    img.src = ev.target.result;
                    document.getElementById('preview-container').classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            });
        </script>
    @endpush
@endsection